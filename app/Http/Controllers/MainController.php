<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function show() {
        return view('mainSide',[
            'main' => Main::latest()->get()
        ]);
    }
  
   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'required|image|file|max:3000',
            'nama' => 'required|max:255',
            'harga' => 'required|numeric|min:100',
            'stock' => 'required',
        ]);
        $validatedData['gambar'] = $request->file('gambar')->store('post-images');
        Main::create($validatedData);
        return redirect()->back()->with('loading','Card Telah Ditambahkan');
    }
    public function stock(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'harga' => 'required',
            'gambar' => 'required',
            'stock' => 'required',
        ]);

        Main::where('id',request()->segment(count(request()->segments())))
        ->update($validatedData);
        return redirect('mainSide')->with('success','Data telah ditambah & stock terupdate');
    }
    public function loading()
    {
        return view('loading');
    }
    public function destroy(Request $request)
    {
        if ($request->deleteGambar) {
            Storage::delete($request->deleteGambar);
        }
        Main::destroy(request()->segment(count(request()->segments())));
        return redirect()->back()->with('success','Card telah terhapus');
    }
}
