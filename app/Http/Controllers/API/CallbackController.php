<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CallbackController extends Controller
{
    protected $serverKey, $transaksi;

    public function __construct()
    {
        $this->serverKey = config("xendit.xendit_key");
        $this->transaksi = new Checkout();
    }

    public function postCallback(Request $request)
    {
        try {

            DB::beginTransaction();

            $reqHeaders = $request->header('x-callback-token');
            $xIncomingCallbackTokenHeader = isset($reqHeaders) ? $reqHeaders : "";

            if ($xIncomingCallbackTokenHeader) {
                if ($request->status == 'PAID' || $request->status == 'SETTLED') {
                    $transaksi = $this->transaksi->where("xenditId", $request->id)->first();
                    $transaksi["tipeTransaksi"] = "ONLINE_PAYMENT";
                    $transaksi["statusOrder"] = $request->status;
                    $transaksi["tanggalBayar"] = date("Y-m-d H:i:s");
                    $transaksi["paymentChannel"] = $request->payment_channel;
                    $transaksi->update();
                }
            }

            DB::commit();

            return response()->json([
                "status" => true,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                "status" => false
            ]);
        }
    }
}
