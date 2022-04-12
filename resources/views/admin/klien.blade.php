@extends('layouts.admin')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Klien</h2>
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
      @foreach ($klienMenunggu as $kM)
        @php
          $n++;
        @endphp
        <tr>
          <td>{{ $n }}</td>
          <td>{{ $kM->name }}</td>
          <td>{{ $kM->email }}</td>
          <td>{{ $kM->username }}</td>
          <td>{{ $kM->status }}</td>
          <td> <a class="badge bg-success" data-bs-toggle="modal" data-bs-target="#editStatus{{ $kM->id }}" data-bs-whatever="Edit Status Pelanggan"><span data-feather="check-square"></span></a>
            <div class="modal fade text-start" id="editStatus{{ $kM->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Setujui Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="/editklien/{{ $kM->id }}" method="post" >
                      @method('put')
                      @csrf
                      {{-- <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus required value="{{ $p->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="deskripsi" class="col-form-label">Deskripsi</label>
                        <textarea class="form-control  @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $p->deskripsi) }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                        <input type="hidden" name="platform_id" id="platform_id" value="{{ $platform->id }}">
                      </div> --}}
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Setuju</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <form action="/hapusklien/{{ $kM->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger" onclick="return confirm('Apakah anda yakin?')"><span data-feather="trash-2"></span></button>
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
      <tbody>
        <tr>
          <td>1,001</td>
          <td>random</td>
          <td>data</td>
          <td>placeholder</td>
          <td>text</td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</main>
@endsection

