@extends('layouts.second')

@section('container')
<div class="row justify-content-center">
  <main>
    <div class="py-5 text-center">
      <h2>Daftar Sebagai Klien</h2>
    </div>
    <div class="row g-5 justify-content-center">
      <div class="col-lg-8 mb-5">
        <form action="/daftar/klien" method="post">
          @csrf
          <div class="row g-3">
            <div class="col-sm-6">
            <label for="firstName" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}">
            <div class="invalid-feedback">
              Nama wajib diisi.
            </div>
          </div>

          <div class="col-sm-6">
            <label for="lastName" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required value="{{ old('username') }}">
            <div class="invalid-feedback">
              Username wajib diisi.
            </div>
          </div>

          <div class="col-6">
            <label for="email" class="form-label">Email</label>
            <div class="input-group has-validation">
              <span class="input-group-text">@</span>
              <input type="email" class="form-control" name="email" id="email" placeholder="nama@contoh.com" required value="{{ old('email') }}">
            <div class="invalid-feedback">
                Email wajib diisi.
              </div>
            </div>
          </div>

          <div class="col-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
            <div class="invalid-feedback">
              Password wajib diisi.
            </div>
          </div>

          <div class="col-6">
            <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
            <div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelamin" value="Laki - Laki">
                <label class="form-check-label" for="jeniskelamin">Laki - Laki</label>  
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelamin" value="Perempuan">
                <label class="form-check-label" for="jeniskelamin">Perempuan</label>
              </div>
            </div>
          </div>
          
          <div class="col-6">
            <label for="noHP" class="form-label">No. Telp/HP</label>
            <input type="number" class="form-control" name="noHP" id="noHP" required value="{{ old('noHP') }}">
            <div class="invalid-feedback">
              No. Telp/HP wajib diisi.
            </div>
          </div>

          <div class="col-6">
            <label for="tempatlahir" class="form-label">Tempat Lahir<span class="text-muted"> (Opsional)</span></label>
            <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" value="{{ old('tempatlahir') }}">
          </div>

          <div class="col-6">
            <label for="tempatlahir" class="form-label">Tanggal Lahir<span class="text-muted"> (Opsional)</span></label>
            <div class="input-group date" id="datepicker">
              <input type="text" class="form-control" id="tanggallahir" name="tanggallahir" value="{{ old('tanggallahir') }}">
              <span class="input-group-append">
                  <span class="input-group-text bg-white">
                      <i class="fa fa-calendar"></i>
                  </span>
              </span>
            </div>
          </div>

            <input type="hidden" name="level" id="level" required value="klien">
            <input type="hidden" name="status" id="status" required value="Aktif">

            <div class="col-12">
              <label for="alamat" class="form-label">Alamat<span class="text-muted"> (Opsional)</span></label>
              <textarea type="text" class="form-control" name="alamat" id="alamat"></textarea>
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