<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;


class DataController extends Controller
{
public function show() 
{
return view('dashboard',[
    'data' => Data::latest()->get()
]);
}

   public function store(Request $request) 
   {
    $validatedData = $request->validate([
        'nama' => 'required|max:255',
        'harga' => 'required|numeric|min:100',
        'jumlah_barang' => 'required',
        'gambar' => 'required',
        "other" => "max:255"
    ]);
//    $data = $request->all();
//    if (count($data['nama'])>0) {
//     foreach ($data['nama'] as $item => $value) {
//         $data2 = array(
//             'nama' => $data['nama'][$item],
//             'harga' => $data['harga'][$item],
//             'jumlah_barang' => $data['jumlah_barang'][$item],
//             'gambar' => $data['gambar'][$item]
//         );
        Data::create($validatedData);
       
    // }
//    }
   return redirect()->back()->with('loading','Data telah ditambah');
   }
   public function destroy(Data $data)
   {
    Data::destroy($data->id);
    return redirect()->back()->with('success','Data telah dihapus');
   }
   
   public function select(Request $request) 
   {
    $date = $request->input('date');
    return view('dashboard',[
        'data' => Data::whereDate('created_at', $date)->get()
    ]);
   }
   
}
