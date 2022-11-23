<x-app-layout>
    {{-- Contain --}}
        @section('linkCSS')
            
        <link rel="stylesheet" href="css/dashboard/style.css" />
        @endsection
 
         <div class="penampungData bg-white shadow p-4 rounded mb-5">
           @if (session()->has('success'))
         <div class="alert alert-success" role="alert">
           {{ session('success') }}
         </div>
         @endif
             <div class="row">
               <div class="col-1"><a href="tambahOrUpdate" class="btn btn-dark mt-1">Terbaru</a></div>
               <div class="col">
                 <form method="POST" action="selectByDateTOU">
                   @csrf
                 <input class="p-0" type="date" name="date"/>
                 <button type="submit" class="btn btn-dark ms-2">Cari tanggal</button>
                 </form></div>
             </div>
             <div class="row border bg-dark text-dark bg-opacity-10 mt-4">
               <div class="col-1 border pt-2">No</div>
               <div class="col-2 border pt-2 dateNoneMobile">Tanggal&Waktu</div>
               <div class="col-3 col-md-2 border pt-2">Nama</div>
               <div class="col-2 col-md-1 border pt-2">Harga</div>
               <div class="col-2 border pt-2">Tambah/Update</div>
               <div class="col-2 border pt-2">Gambar</div>
               <div class="col-2 border pt-2">Action</div>
             </div>
             @foreach ($TOU as $item)
             <div class="row border" id="perItem{{ $item->id }}">
     <div class="col-1 border pt-2">{{ $loop->iteration }}</div>
     <div class="col-2 border pt-2 dateNoneMobile">{{ $item->created_at->format('d-m-Y H:i:s'); }}</div>
     <div class="col-3 col-md-2 border pt-2">{{ $item->nama }}</div>
     <div class="col-2 col-md-1 border pt-2">Rp {{ number_format($item->harga) }}<div class="Modal modal{{ $item->id }} position-absolute bg-light d-none">
 <img src="{{ asset('storage/'. $item->gambar) }}" alt="" class="rounded">
 </div></div>
     <div class="col-2 border pt-2">{{ $item->bukti }}</div>
     <div class="col-2 border pt-2 pb-md-2 pb-0">
       <img
         src="{{ asset('storage/'. $item->gambar) }}"
         alt="" class="gambarPerItem"
       />
       <button class="badge text-dark bg-success border-0 DNL" id="tekanLihatGambar{{ $item->id }}" onmousedown="showImage({{ $item->id }})" onmouseup="leftMouseImage({{ $item->id }})" onclick="seeImage({{ $item->id }})"><i class="bi bi-eye-fill"></i></button>
       <button class="badge text-dark bg-success border-0 d-none DNT" id="tekanTutupGambar{{ $item->id }}" onclick="closeImage({{ $item->id }})"><i class="bi bi-eye-fill"></i></button>
     </div>
     <div class="col-2 border pt-2">
       <form method="POST" action="deleteTOU/{{ $item->id }}" id="deleteData{{ $item->id }}" onclick="deleteDataTOU({{ $item->id }})">
         @csrf
       <button class="btn btn-danger hapusRow mt-1">Delete</button>
       </form>
     </div>
     <div class="col border pt-2 dateMobile text-center">Tanggal : {{ $item->created_at->format('d-m-Y H:i:s'); }}</div>
   </div>
             @endforeach
           </div>
        @section('linkJS')
            
        <script src="js/dashboard/script.js"></script>
        @endsection
 </x-app-layout>
 