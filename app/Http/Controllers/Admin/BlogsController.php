<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use DateTime;
use Faker\Core\Blood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogsController extends Controller
{
    public function index()
    {
        $blog = Blog::where('id', 1)->first();
        $data['blog'] = $blog;
        return view('Admin.blog', $data);
    }
    public function edit(Request $request, $id)
    {
        $params1 = $request->all();
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            if ($file->isValid()) {
                $params1['gambar'] = $this->simpanImage('blog', $file);
            } else {
                return redirect()->back()->with('error', 'File foto tidak valid');
            }
        } else {
            $params1 = $request->except('gambar');
        }

        $kategori = Blog::findOrFail($id);
        if ($kategori->update($params1)) {
            return back()->with('success', 'Blog updated successfully');
        } else {
            return back()->with('error', 'Blog updated Error');
        }
    }
    private function simpanImage($type, $foto)
    {
        $dt = new DateTime();

        $path = public_path('storage/uploads' . $type . '/' . $dt->format('Y-m-d'));
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true, true);
        }
        $file = $foto;
        $name =  $type  . '_' . $dt->format('Y-m-d');
        $fileName = $name . '.' . $file->getClientOriginalExtension();
        $folder = '/uploads' . $type . '/' . $dt->format('Y-m-d');

        $check = public_path($folder) . $fileName;

        if (File::exists($check)) {
            File::delete($check);
        }

        $filePath = $file->storeAs($folder, $fileName, 'public');
        return $filePath;
    }
}
