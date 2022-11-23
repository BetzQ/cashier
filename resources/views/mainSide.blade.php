<x-app-layout>

       @section('linkCSS')
           
       <link rel="stylesheet" href="css/mainSide/style.css" />
       @endsection
        {{-- Contain --}}
    <div class="container">
      <div class="row isiDaftar">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
        @if (session()->has('loading'))
        <div class="d-flex justify-content-center p-5 mt-3 loading bg-dark">
          <div class="p-5 rounded bg-dark">
              <div class="d-flex">
                  <h1 class="text-white">tunggu sebentar</h1>
                  <img class="position-absolute loading00" width="100" src="https://retchhh.files.wordpress.com/2015/03/loading1.gif" alt="">
              </div>
      </div>
      </div>
        @endif
        @foreach ($main as $item)
        <div class="col-md-3 col-6 mb-4 d-flex justify-content-center">
        <div class="card shadow" style="width: 100%;height:99%">
          <button class="position-absolute trashCard border-0 rounded" onclick="buttonDeleteCard({{ $item->id }})"><i class="bi bi-trash"></i></button>
          <input type="hidden" class="inputItem{{ $item->id }}" value="{{ $item->id }}">
          <input type="hidden" class="inputGambar{{ $item->id }}" value="{{ $item->gambar }}">
          <input type="hidden" class="inputHarga{{ $item->id }}" value="{{ $item->harga }}">
          <img
          src="{{ asset('storage/'. $item->gambar) }}"
          class="card-img-top mt-2 gambarBarang{{ $item->id }}"
          alt="..."
        />
          <div class="card-body">
            <h5 class="card-title namaBarang{{ $item->id }} text-center">{{ $item['nama'] }}</h5>
            <p class="card-text hargaBarang{{ $item->id }} text-center">Rp <b class="HBarang{{ $item->id }}">{{ number_format($item->harga) }}</b></p>
            <p class="card-text hargaBarang{{ $item->id }} text-center"><small> Stock : <b class="SBarang{{ $item->id }}">{{ $item->stock }}</b></small></p>
            <button href="#" class="btn btn-outline-success itemTambahSatu item{{ $item->id }} textCenter"
              onclick="tambahSatuItem({{ $item->id }},{{ $item->stock }})"
            ><i class="bi bi-plus-lg"></i
          ></button>
         

          <div class="d-flex d-none bgItem bgItem{{ $item->id }} d-none">
                  <button href="#" class="btn btn-outline-danger item itemMinus itemMinus{{ $item->id }}" onclick="kurangiItem({{ $item->id }})"
                ><i class="bi bi-dash-lg"></i></button>
                <div class="position-relative bgJmlItem ps-4"><p class="jmlItem{{ $item->id }}">0</p></div>
              <button href="#" class="btn btn-outline-success item itemPlus itemPlus{{ $item->id }}"
                onclick="tambahLebihDariSatuItem({{ $item->id }})"
                ><i class="bi bi-plus-lg"></i
              ></button>
             
          </div>
          <input type="text" class="otherHand rounded ps-1 d-none" id="otherHand{{ $item->id }}" placeholder="Other..">
          <div class="d-flex mt-2 batalOrKirim batalOrKirim{{ $item->id }} d-none">
            <button
            class="btn btn-danger sendSelectedData" onclick="batalKirim({{ $item->id }},{{ $item->stock }})"
          >
            batal
          </button>
            <button
            class="btn btn-primary ms-2" onclick="sendSelectedData({{ $item->id }})"
          >
            kirim
          </button>
          </div>
          
          {{-- Penghapusan apabila stock < 1 --}}
          <form method="POST" action="deleteCard/{{ $item->id }}" id="deleteCard{{ $item->id }}" style="visibility: hidden;position: absolute;">
            @csrf
            <input type="text" value="{{ $item->gambar }}" name="deleteGambar">
          </form>
          
          {{-- Stock Barang --}}
          <button href="#" class="btn btn-outline-warning editStock mt-2 stock{{ $item->id }} d-block"
            onclick="stockEdit({{ $item->id }},{{ $item->stock }})"
          >Edit Stock</button>
        <input type="number" placeholder="Edit stock.." class="rounded form-control bgStock{{ $item->id }} d-none" value="{{ $item->stock }}">
        <div class="d-flex">
        <button href="#" class="btn btn-danger batal batal0{{ $item->id }} mt-2 item{{ $item->id }} d-none"
          onclick="batal({{ $item->id }})"
        >Batal</button>
        <button href="#" class="btn btn-primary batal batal0{{ $item->id }} ms-2 mt-2 item{{ $item->id }} d-none"
          onclick="update({{ $item->id }})"
        >Update</button>
      </div>
          </div>
        </div>
      </div>
      <form method="POST" action="adjustStock/stock/{{ $item->id }}" id="adjustStock{{ $item->id }}" style="visibility: hidden;position: absolute;">
        @csrf
        <input type="hidden" name="nama" value="{{ $item->nama }}">
        <input type="hidden" name="harga" value="{{ $item->harga }}">
        <input type="hidden" name="gambar" value="{{ $item->gambar }}">
      </form>
      {{-- Khusus Edit Stock --}}
      <form method="POST" action="adjustStock00/stock/{{ $item->id }}" id="adjustStock00{{ $item->id }}" style="visibility: hidden;position: absolute;">
        @csrf
        <input type="hidden" name="nama" value="{{ $item->nama }}">
        <input type="hidden" name="harga" value="{{ $item->harga }}">
        <input type="hidden" name="gambar" value="{{ $item->gambar }}">
      </form>
      {{-- Bukti Stock --}}
      <form method="POST" action="buktiStock" id="buktiStock{{ $item->id }}" style="visibility: hidden;position: absolute;">
        @csrf
        <input type="hidden" name="nama" value="{{ $item->nama }}">
        <input type="hidden" name="harga" value="{{ $item->harga }}">
        <input type="hidden" name="gambar" value="{{ $item->gambar }}">
      </form>
        @endforeach
      </div>
    </div>


    <div class="x-circle position-absolute rounded-circle text-dark d-none">
      <b><i class="bi bi-x-lg"></i></b>
    </div>
    <button
      class="masukkanKeranjang position-absolute px-5 py-1 rounded border-0 shadow d-none" onclick="sendSelectedData()"
    >
      masukkan ke data
    </button>
   
    <form method="POST" action="{{ route('sendData') }}" id="sendSelectedData" style="visibility: hidden;position: absolute;">
      @csrf
    </form>
   
  

       @section('linkJS')
           
       <script src="js/mainSide/script.js"></script>
       @endsection
      </x-app-layout>