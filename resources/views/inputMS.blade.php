<x-app-layout>
    @section('linkCSS')
    <link rel="stylesheet" href="css/inputMS/style.css" />
    @endsection
    @if (session()->has('loading'))
        <div class="d-flex justify-content-center p-5 mt-5 mb-5 bg-dark">
          <div class="p-5 rounded bg-dark">
              <div class="d-flex">
                  <h1 class="text-white">tunggu sebentar</h1>
                  <img class="position-absolute loading00" width="100" src="https://retchhh.files.wordpress.com/2015/03/loading1.gif" alt="">
              </div>
      </div>
      </div>
        @endif
    <div class="container d-flex justify-content-center mt-5">
      
        <div class="bgInputMS p-5 bg-light rounded shadow border">
          @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
        @if ($gambar)
        <input type="hidden" value="{{ $gambar->gambar }}" id="gambar00">
        @endif
        
          <form method="POST" action="tambahCard/tc" enctype="multipart/form-data" id="Card00">
            @csrf
          <label for="gambar" class="form-label">Masukkan Gambar Barang</label>
          <img class="img-preview img-fluid mb-3">
          <div class="input-group mb-3">
            <input
              type="file"
              class="form-control @error('gambar') is-invalid @enderror"
              id="gambar"
              name="gambar"
              aria-describedby="basic-addon3"
              onchange="previewImage()"
               required
            />
            
            @error('gambar') 
            <div class="invalid-feedback">
              Harus memasukkan gambar
              </div> @enderror
          </div>
          <label for="nama" class="form-label">Masukkan Nama Barang</label>
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control @error('nama') is-invalid @enderror"
              id="nama"
              name="nama"
              aria-describedby="basic-addon3"
              value="{{ old('nama') }}"
              required
            />
            @error('nama') 
            <div class="invalid-feedback">
              Harus memasukkan nama barang
              </div> @enderror
          </div>
          <label for="harga" class="form-label @error('harga') is-invalid @enderror">Masukkan Harga Barang</label>
          <div class="input-group mb-3">
            <input
              type="number"
              class="form-control"
              id="harga"
              name="harga"
              aria-describedby="basic-addon3"
              value="{{ old('harga') }}"
              required
            />
            @error('harga') 
            <div class="invalid-feedback">
              Harus memasukkan harga barang
              </div> @enderror
          </div>
          <label for="stock" class="form-label @error('stock') is-invalid @enderror">Masukkan Stock Barang</label>
          <div class="input-group mb-3">
            <input
              type="number"
              class="form-control"
              id="stock"
              name="stock"
              aria-describedby="basic-addon3"
              value="{{ old('stock') }}"
              required
            />
            @error('stock') 
            <div class="invalid-feedback">
              Harus memasukkan stock barang
              </div> @enderror
          </div>
          <div class="d-flex justify-content-center">
          <button onclick="tambah()" class="btn btn-light shadow border">Tambah Card</button>
        </div>
        </form>
        </div>
        <form method="POST" action="inputMSTambah" id="inputMSTambah" style="visibility: hidden;position: absolute;">
          @csrf
        </form>
      </div>
      @section('linkJS')
      <script src="js/inputMS/script.js"></script>
      @endsection
</x-app-layout>