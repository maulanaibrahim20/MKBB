<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use DateTime;
use Faker\Core\Blood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class BlogsController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        $data['blogs'] = $blog;
        return view('Admin.blog.index', $data);
    }
    public function create()
    {
        return view('Admin.blog.create');
    }
    public function store(Request $request)
    {
        $params = $request->all();
        $random = rand(10000, 99999);
        if ($request->has('gambar')) {
            $params['gambar'] = $this->simpanImage('blog', $request->file('gambar'), $random);
        }
        $blog = Blog::create($params);
        if ($blog) {
            return redirect('/admin/blog-test/index')->with('success', 'Blog updated successfully');
        } else {
            return redirect('/admin/blog-test/index')->with('error', 'Blog updated Error');
        }
    }
    public function edit($id)
    {
        $blog = Blog::where('id', Crypt::decrypt($id))->first();
        // dd($blog);
        $data['blog'] = $blog;
        return view('Admin.blog.edit', $data);
    }
    public function upload(Request $request, $id)
    {
        // dd('hallo');
        $params1 = $request->all();
        $random = rand(10000, 99999);
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            if ($file->isValid()) {
                $params1['gambar'] = $this->simpanImage('blog', $file, $random);
            } else {
                return redirect()->back()->with('error', 'File foto tidak valid');
            }
        } else {
            $params1 = $request->except('gambar');
        }

        $kategori = Blog::findOrFail(Crypt::decrypt($id));
        if ($kategori->update($params1)) {
            return redirect('/admin/blog-test/index')->with('success', 'Blog updated successfully');
        } else {
            return redirect('/admin/blog-test/index')->with('error', 'Blog updated Error');
        }
    }
    public function destroy($id)
    {
        $blog = Blog::findOrFail(Crypt::decrypt($id));
        $url = $blog->gambar;
        $dir = public_path('storage/' . substr($url, 0, strrpos($url, '/')));
        $path = public_path('storage/' . $url);

        File::delete($path);

        rmdir($dir);
        if ($blog->delete()) {
            return redirect('/admin/blog-test/index')->with('success', 'Blog updated successfully');
        } else {
            return redirect('/admin/blog-test/index')->with('error', 'Blog updated Error');
        }
    }
    private function simpanImage($type, $foto, $nama)
    {
        $dt = new DateTime();

        $path = public_path('storage/uploads' . $type . '/' . $dt->format('Y-m-d') . '/' . $nama);
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true, true);
        }
        $file = $foto;
        $name =  $type  . '_' . $nama . '_' . $dt->format('Y-m-d');
        $fileName = $name . '.' . $file->getClientOriginalExtension();
        $folder = '/uploads' . $type . '/' . $dt->format('Y-m-d') . '/' . $nama;

        $check = public_path($folder) . $fileName;

        if (File::exists($check)) {
            File::delete($check);
        }

        $filePath = $file->storeAs($folder, $fileName, 'public');
        return $filePath;
    }
}
