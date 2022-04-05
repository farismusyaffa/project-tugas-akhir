@extends('layouts.second')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
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
        
    </div>
</div>
  
@endsection