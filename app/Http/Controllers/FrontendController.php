<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\CheckoutDetail;
use App\Models\Customer;
use App\Models\Keranjang;
use App\Models\KeranjangProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Xendit\Xendit;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    protected $checkout, $checkoutDetail, $serverKey;

    public function __construct(Checkout $checkout, CheckoutDetail $checkoutDetail)
    {
        $this->checkout = $checkout;
        $this->serverKey = config("xendit.xendit_key");
        $this->checkoutDetail = $checkoutDetail;
    }

    public function index()
    {
        $data['produk'] = Produk::all();
        return view('frontend.index', $data);
    }

    public function cart()
    {
        $data['keranjang'] = KeranjangProduk::select('keranjang_produks.*')
            ->join('keranjangs', 'keranjang_produks.keranjang_id', '=', 'keranjangs.id')
            ->where('keranjangs.status', 'keranjang')
            ->where('keranjang_produks.customer_id', Auth::user()->customer->id)
            ->get();

        return view('frontend.cart', $data);
    }

    public function cartPost(Request $request)
    {
        try {
            DB::beginTransaction();

            $keranjang = Keranjang::where('customer_id', Auth::user()->customer->id)
                ->where('status', 'keranjang')
                ->first();
            if (!$keranjang) {
                // Jika tidak ada, buat keranjang baru
                $keranjang = Keranjang::create([
                    'customer_id' => Auth::user()->customer->id,
                    'status' => 'keranjang',
                ]);
            }
            KeranjangProduk::create([
                'toko_id' => $request->toko_id,
                'customer_id' => Auth::user()->customer->id,
                'keranjang_id' => $keranjang->id,
                'produk_id' => $request->produk_id,
                'qty' => 1,
                'harga' => $request->harga
            ]);

            DB::commit();
            return back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    public function pluscart(Request $request, $id)
    {
        $produk = Produk::pluck('harga')->first();
        $keranjang = KeranjangProduk::where('id', $id)->first();
        $params['qty'] = $keranjang->qty + 1;
        $params['harga'] = $keranjang->harga + $produk;
        $keranjang->update($params);
        return back()->with('success', 'success');
    }

    public function minuscart(Request $request, $id)
    {
        $produk = Produk::pluck('harga')->first();
        $keranjang = KeranjangProduk::where('id', $id)->first();
        $params['qty'] = $keranjang->qty - 1;
        $params['harga'] = $keranjang->harga - $produk;
        $keranjang->update($params);
        return back()->with('success', 'success');
    }

    public function checkoutProduk(Request $request)
    {
        Xendit::setApiKey('xnd_development_Pla36WiCzPX2ehj5YqRqwV9oa2j6CfIa4wbJYVL5Juo89EBNArv8WtYyyzXbfq9');
        try {
            DB::beginTransaction();

            $keranjang = Keranjang::where('customer_id', Auth::user()->customer->id)
                ->where('status', 'keranjang')
                ->firstOrFail();
            $keranjangProduks = KeranjangProduk::where('keranjang_id', $keranjang->id)->get();

            $checkout = Checkout::create([
                'invoiceId' => 'INV-' . time(),
                'tipeTransaksi' => $request->payment,
                'keranjang_id' => $keranjang->id,
                'customer_id' => Auth::user()->customer->id,
                'statusPengiriman' => 'belum_dikirim',
                'tanggal' => now(),
                'totalHarga' => $request->totalHarga,
            ]);

            foreach ($keranjangProduks as $keranjangProduk) {
                $produk = Produk::findOrFail($keranjangProduk->produk_id);

                if ($produk->stok < $keranjangProduk->qty) {
                    throw new \Exception('Stok tidak mencukupi untuk produk: ' . $produk->namaProduk);
                }

                $produk->stok -= $keranjangProduk->qty;
                $produk->save();

                CheckoutDetail::create([
                    'toko_id' => $keranjangProduks->pluck('toko_id')->first(), // Anda mungkin ingin mengambil toko_id yang sesuai
                    'checkout_id' => $checkout->id,
                    'produk_id' => $keranjangProduk->produk_id,
                    'qtyProduk' => $keranjangProduk->qty,
                    'hargaProduk' => $keranjangProduk->harga,
                ]);
            }

            // $keranjang->update(['status' => 'checkout']);

            $amount = $checkout['totalHarga'];
            $params = [
                "external_id" => $checkout["invoiceId"],
                "amount" => $amount,
                "description" => "Online Payment",
                "invoice_duration" => 1800,
                "currency" => "IDR",
                "success_redirect_url" => env("APP_URL") . "/"
            ];

            $createInvoiceRequest = \Xendit\Invoice::create($params);

            $this->checkout->where("id", $checkout["id"])->update([
                "status" => "belum bayar",
                "xenditId" => $createInvoiceRequest["id"]
            ]);

            DB::commit();
            return redirect('/checkout')->with('success', 'Checkout berhasil.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat checkout: ' . $e->getMessage());
        }
    }

    public function checkout()
    {
        $keranjang = Keranjang::where('status', 'keranjang')->first();
        $pembeli = Customer::where('id', Auth::user()->customer->id)->first();
        $customer = KeranjangProduk::where('customer_id', Auth::user()->customer->id)
            ->where('keranjang_id', $keranjang->id)
            ->first();
        $customer = KeranjangProduk::where('customer_id', Auth::user()->customer->id)
            ->where('keranjang_id', $keranjang->id)
            ->get();
        $xenditId = Checkout::where('keranjang_id', $keranjang->id)->pluck('xenditId')->first();
        $data = [
            'keranjang' => $keranjang,
            'customer' => $customer,
            'pembeli' => $pembeli,
            'xenditId' => $xenditId
        ];
        return view('Frontend.chekout', $data);
    }


    public function checkoutPayment(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $checkout = Checkout::where('keranjang_id', $id)->first();
            $keranjang = Keranjang::where('id', $checkout->keranjang_id)->first();
            $paymentChannel = $request->payment;

            if ($paymentChannel === 'COD') {
                $tipeTransaksi = 'COD';
                $xenditId = null;
            }
            $keranjang->update(['status' => 'checkout']);
            $checkout->update([
                'status' => 'sudah bayar',
                'tipeTransaksi' => $tipeTransaksi,
                'xenditId' => $xenditId,
            ]);

            DB::commit();

            return redirect('/')->with('success', 'Checkout berhasil. Silahkan tunggu konfirmasi dari penjual.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat checkout: ' . $e->getMessage());
        }
    }



    public function deletecart($id)
    {
        KeranjangProduk::where('id', $id)->delete();

        // Keranjang::find($id)->delete();

        return redirect()->back()->with('success', 'Item keranjang berhasil dihapus.');
    }
    public function detail()
    {
        return view('frontend.detail');
    }

    public function product()
    {
        $data['produk'] = Produk::all();
        return view('frontend.product', $data);
    }

    public function blogs()
    {
        return view('frontend.blogs');
    }

    public function info()
    {
        return view('frontend.info');
    }
}
