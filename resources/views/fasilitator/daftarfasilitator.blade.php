@extends('layouts.second')

@section('container')
<div class="row justify-content-center">
    {{-- <div class="col-md-5">
        <main class="form-regristration">
            <h1 class="h3 mb-3 fw-normal text-center">Daftar sebagai Fasilitator</h1>
            <form action="/daftarfasilitator" method="post">
            @csrf
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{ old('name') }}">
                <label for="name">Nama</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password"class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <input type="hidden" name="level" id="level" required value="fasilitator">
              <input type="hidden" name="status" id="status" required value="Menunggu">
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Daftar</button>
            </form>
            <small class="d-block text-center mt-3">Sudah Terdaftar? <a href="/">Masuk Sekarang!</a></small>
        </main> 
    </div> --}}
    <main>
      <div class="py-5 text-center">
        <h2>Daftar Sebagai Fasilitator</h2>
      </div>
      <div class="row g-5 justify-content-center">
        <div class="col-lg-8 mb-5">
          <form action="/daftarfasilitator" method="post">
            @csrf
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" required value="{{ old('name') }}">
                <div class="invalid-feedback">
                  Nama wajib diisi.
                </div>
              </div>
  
              <div class="col-sm-6">
                <label for="lastName" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" required value="{{ old('username') }}">
                <div class="invalid-feedback">
                  Username wajib diisi.
                </div>
              </div>
  
              <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <div class="input-group has-validation">
                  <span class="input-group-text">@</span>
                  <input type="email" class="form-control" id="email" placeholder="nama@contoh.com" required value="{{ old('email') }}">
                <div class="invalid-feedback">
                    Email wajib diisi.
                  </div>
                </div>
              </div>
  
              <div class="col-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" required>
                <div class="invalid-feedback">
                  Password wajib diisi.
                </div>
              </div>

              <div class="col-6">
                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                <div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="jeniskelamin" value="Laki - Laki">
                    <label class="form-check-label" for="jeniskelamin">Laki - Laki</label>  
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="jeniskelamin" value="Perempuan">
                    <label class="form-check-label" for="jeniskelamin">Perempuan</label>
                  </div>
                </div>
              </div>
              
              <div class="col-6">
                <label for="notelp" class="form-label">No. Telp/HP</label>
                <input type="number" class="form-control" id="notelp" required value="{{ old('notelp') }}">
                <div class="invalid-feedback">
                  No. Telp/HP wajib diisi.
                </div>
              </div>

              <div class="col-6">
                <label for="tempatlahir" class="form-label">Tempat Lahir<span class="text-muted"> (Opsional)</span></label>
                <input type="text" class="form-control" id="tempatlahir" value="{{ old('tempatlahir') }}">
              </div>

              <div class="col-6">
                <label for="tempatlahir" class="form-label">Tanggal Lahir<span class="text-muted"> (Opsional)</span></label>
                <div class="input-group date" id="datepicker">
                  <input type="text" class="form-control"id="tanggallahir" name="tanggallahir">
                  <span class="input-group-append">
                      <span class="input-group-text bg-white">
                          <i class="fa fa-calendar"></i>
                      </span>
                  </span>
                </div>
              </div>

              <div class="col-sm-6">
                <label for="pekerjaan" class="form-label">Pekerjan<span class="text-muted"> (Opsional)</span></label>
                <input type="text" class="form-control" id="pekerjaan" value="{{ old('pekerjaan') }}">
              </div>

               <div class="col-sm-6">
                <label for="institusi" class="form-label">Institusi<span class="text-muted"> (Opsional)</span></label>
                <input type="text" class="form-control" id="institusi" value="{{ old('institusi') }}">
              </div>
  
              <input type="hidden" name="level" id="level" required value="klien">
              <input type="hidden" name="status" id="status" required value="Menunggu">

              <div class="col-12">
                <label for="alamat" class="form-label">Alamat<span class="text-muted"> (Opsional)</span></label>
                <textarea type="text" class="form-control" id="alamat"></textarea>
              </div>
              <hr class="my-3">
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Daftar</button>
          </form>
          <small class="d-block text-center mt-3">Sudah Terdaftar? <a href="/">Masuk Sekarang!</a></small>
        </div>
      </div>
    </main>
</div>

<script type="text/javascript">
  $(function() {
      $('#datepicker').datepicker({
        format: 'yy/mm/dd'
      });
  });
</script>
<script type="text/javascript">
  $(function() {
      $('#datepicker1').datepicker({
        format: 'yy/mm/dd'
      });
  });
</script>
@endsection