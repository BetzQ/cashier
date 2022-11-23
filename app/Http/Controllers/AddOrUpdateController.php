<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\addOrUpdate;

class AddOrUpdateController extends Controller
{
    public function show() 
    {
        return view("tambahOrUpdate",[
            'TOU' => addOrUpdate::latest()->get() 
        ]);
    }
    public function showCard()
    {
        return view('inputMS',[
            'gambar' => Main::latest()->first()
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'required',
            'nama' => 'required|max:255',
            'harga' => 'required|numeric|min:100',
            'bukti' => 'required',
        ]);
        addOrUpdate::create($validatedData);
        return redirect()->back()->with('success','Stock telah diupdate');
    }
    public function storeCard(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'required',
            'nama' => 'required|max:255',
            'harga' => 'required|numeric|min:100',
            'bukti' => 'required',
        ]);
        addOrUpdate::create($validatedData);
        return redirect()->back()->with('success','Card telah ditambahkan');
    }
    public function destroy(addOrUpdate $addOrUpdate)
   {
    addOrUpdate::destroy(request()->segment(count(request()->segments())));
    return redirect()->back()->with('success','Data telah dihapus');
   }
   public function select(Request $request) 
   {
    $date = $request->input('date');
    return view('tambahOrUpdate',[
        'TOU' => addOrUpdate::whereDate('created_at', $date)->get()
    ]);
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
        return redirect('mainSide')->with('loading','Data telah ditambah');
    }
}
