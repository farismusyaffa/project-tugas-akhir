@extends('layouts.admin')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Fasilitator</h2>
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
  </div>

  <h5>Menunggu</h5>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Username</th>
          <th scope="col">Status</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>
      @php
          $n = 0;
      @endphp
      @foreach ($fasilitatorMenunggu as $fM)
        @php
          $n++;
        @endphp
        <tr>
          <td>{{ $n }}</td>
          <td>{{ $fM->name }}</td>
          <td>{{ $fM->email }}</td>
          <td>{{ $fM->username }}</td>
          <td>{{ $fM->status }}</td>
          <td> 
            {{-- <a class="badge bg-success" data-bs-toggle="modal" data-bs-target="#editStatus{{ $fM->id }}" data-bs-whatever="Edit Status Pelanggan"><span data-feather="check-square"></span></a> --}}
            <form action="/hapusfasilitator/{{ $fM->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin?')"><span data-feather="trash-2"></span></button>
            </form></td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>

  <h5>Aktif</h5>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Username</th>
          <th scope="col">Status</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      @php
      $n = 0;
  @endphp
  @foreach ($fasilitatorAktif as $fA)
    @php
      $n++;
    @endphp
    <tr>
      <td>{{ $n }}</td>
      <td>{{ $fA->name }}</td>
      <td>{{ $fA->email }}</td>
      <td>{{ $fA->username }}</td>
      <td>{{ $fA->status }}</td>
      <td> 
        <a class="badge bg-info" data-bs-toggle="modal" data-bs-target="#infofasilitator{{ $fA->id }}" data-bs-whatever="Edit Status Pelanggan"><span data-feather="info"></span></a>
        <form action="/hapusfasilitator/{{ $fA->id }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin?')"><span data-feather="trash-2"></span></button>
        </form></td>
    </tr>
    <div class="modal fade text-start" id="infofasilitator{{ $fA->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Info fasilitator</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                {{-- <form action="/editfasilitator/{{ $fM->id }}" method="post">
                    @method('put')
                    @csrf --}}
                  <div class="row g-3">
                      <div class="col-sm-6">
                        <label for="firstName" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" required value="{{ $fA->name }}" disabled readonly>
                        <div class="invalid-feedback">
                        Nama wajib diisi.
                        </div>
                      </div>
        
                      <div class="col-sm-6">
                        <label for="lastName" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required value="{{ $fA->username }}" disabled readonly>
                        <div class="invalid-feedback">
                        Username wajib diisi.
                        </div>
                      </div>
        
                      <div class="col-sm-8">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text">@</span>
                          <input type="email" class="form-control" name="email" id="email" placeholder="nama@contoh.com" required value="{{ $fA->email }}" disabled readonly>
                          <div class="invalid-feedback">
                              Email wajib diisi.
                          </div>
                        </div>
                      </div>
                    
                    {{-- <div class="col-6">
                      <label for="password" class="form-label">Password</label>
                      <input type="hidden" class="form-control" name="password" id="password" required value="{{ $fA->password }}">
                        <div class="invalid-feedback">
                        Password wajib diisi.
                        </div>
                    </div> --}}
        
                      <div class="col-sm-4">
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jeniskelamin" id="jeniskelamin" disabled readonly>
                            <option value="Laki - Laki" @if($fA->jeniskelamin === 'Laki - Laki') selected @endif>Laki - Laki</option>
                            <option value="Perempuan" @if($fA->jeniskelamin === 'Perempuan') selected @endif>Perempuan</option>
                        </select>
                      </div>
                    
                      <div class="col-sm-6">
                        <label for="noHP" class="form-label">No. Telp/HP</label>
                        <input type="number" class="form-control" name="noHP" id="noHP" required value="{{ $fA->noHP }}" disabled readonly>
                        <div class="invalid-feedback">
                        No. Telp/HP wajib diisi.
                        </div>
                    </div>
      
                    <div class="col-sm-6">
                      <label for="pekerjaan" class="form-label">Pekerjan</label>
                      <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{ $fA->pekerjaan }}" disabled readonly>
                    </div>
      
                     <div class="col-sm-6">
                      <label for="tempatpekerjaan" class="form-label">Tempat Bekerja</label>
                      <input type="text" class="form-control" name="tempatpekerjaan" id="tempatpekerjaan" value="{{ $fA->tempatpekerjaan }}" disabled readonly>
                    </div>

                    <div class="col-sm-6">
                      <label for="tempatlahir" class="form-label">Tempat Lahir<span class="text-muted"></label>
                      <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" value="{{ $fA->tempatlahir }}" disabled readonly>
                  </div>
      
                  <div class="col-sm-6">
                      <label for="tempatlahir" class="form-label">Tanggal Lahir<span class="text-muted"></label>
                      {{-- <div class="input-group date" id="datepicker"> --}}
                      <input type="text" class="form-control" id="tanggallahir" name="tanggallahir" value="{{ $fA->tanggallahir }}" disabled readonly>
                      </div>
                  </div>

                        <div class="col-sm-12">
                          <label for="alamat" class="form-label">Alamat<span class="text-muted"></label>
                          <textarea type="text" class="form-control" name="alamat" id="alamat" disabled readonly>{{ old('alamat', $fA->alamat) }}</textarea>
                        </div>
                {{-- </form> --}}
          </div>
        </div>
      </div>
    </div>
  @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection

