@extends('layouts.main2')

@section('container')
<main>
  {{-- <h1 class="visually-hidden">Heroes examples</h1> --}}
  {{-- @foreach($platform as $p) --}}
  <div class="text-center">
    <h1 class="display-5 fw-bold">Strategi Platform {{ $platform->nama }}!</h1>
    <div class="col-lg-6 mx-auto">
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-3 pt-3 pb-4 border-bottom">
          <a href="/strategifasilitator/{{ $platform->id }}" class="btn btn-primary"><i class="bi bi-info-square"></i> Strategi</a>
          <a href="/indikatorfasilitator/{{ $platform->id }}" class="btn btn-primary"><i class="bi bi-info-square"></i> Indikator</a>
          <a href="/dashboardfasilitator/{{ $platform->id }}" class="btn btn-primary"><i class="bi bi-info-square"></i> Dashboard</a>
        </div>
    </div>
  </div>

  <div class="border-bottom">
    <h3 class="text-center mt-3">1. Platform Anda</h3>
    <div class="mx-auto"> 
      <div class="card mt-4 mb-4 card text-center">
            <h5 class="card-header text-center">{{ $platform->nama }}</h5>
            <div class="card-body">
                <p class="card-text">{{ $platform->deskripsi }}</p>
            </div>
            <p class="card-header text-center">Fasilitator : {{ $platform->fasilitator->name }} </p>
      </div>
    </div>
  </div>
  <div class="border-bottom">
    <h3 class="text-center mt-3">2. Pelanggan</h3>
    <div class="mx-auto"> 
      <div class="card mt-4 mb-4 card">
            <div class="card-header text-center">
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $n = 0;
                  @endphp
                  @foreach ($pelanggan as $p)
                    @php
                      $n++;
                    @endphp
                  <tr>
                    <th scope="row">{{ $n }}</th>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->deskripsi }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
      </div>
    </div>
  </div>
  <div class="border-bottom">
    <h3 class="text-center mt-3">3. Interaksi</h3>
    @if($countPelanggan > 0)
      <div class="mx-auto"> 
        <div class="card mt-4 mb-4 card">
              <div class="card-header">
                <h5>Platform ke Pelanggan</h5>
              </div>
              <div class="card-body">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Asal</th>
                      <th scope="col">Tujuan</th>
                      <th scope="col">Value</th>
                      <th scope="col">Moneter?</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $n = 0;
                    @endphp
                    @foreach ($interaksiPltoPel as $i)
                      @php
                        $n++;
                      @endphp
                    <tr>
                      <th scope="row">{{ $n }}</th>
                      <td>{{ $i->platform->nama }}</td>
                      <td>{{ $i->pelanggan->nama }}</td>
                      <td>{{ $i->nilai }}</td>
                      <td>{{ $i->moneter }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-header">
                <h5>Pelanggan ke Platform</h5>
              </div>
              <div class="card-body">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Asal</th>
                      <th scope="col">Tujuan</th>
                      <th scope="col">Value</th>
                      <th scope="col">Moneter?</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $n = 0;
                    @endphp
                    @foreach ($interaksiPeltoPl as $i)
                      @php
                        $n++;
                      @endphp
                    <tr>
                      <th scope="row">{{ $n }}</th>
                      <td>{{ $i->pelanggan->nama }}</td>
                      <td>{{ $i->platform->nama }}</td>
                      <td>{{ $i->nilai }}</td>
                      <td>{{ $i->moneter }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-header">
                <h5>Pelanggan ke Pelanggan</h5>
              </div>
              <div class="card-body">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Asal</th>
                      <th scope="col">Tujuan</th>
                      <th scope="col">Value</th>
                      <th scope="col">Moneter?</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $n = 0;
                    @endphp
                    @foreach ($interaksiPeltoPel as $i)
                      @php
                        $n++;
                      @endphp
                    <tr>
                      <th scope="row">{{ $n }}</th>
                      <td>{{ $i->asal }}</td>
                      <td>{{ $i->tujuan }}</td>
                      <td>{{ $i->nilai }}</td>
                      <td>{{ $i->moneter }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
      </div>
      @else
        <h5 class="text-center mt-4">Pelanggan Belum Diidentikasi</h5>
      @endif
  </div>
  <div class="border-bottom">
    <h3 class="text-center mt-3">4.Spike dan Linchpin</h3>
    @if($countInteraksi > 0)
      <div class="row text-center"> 
        <div class="mt-4 mb-4 col-sm-6">
          <div class="card">
            <div class="card-header">
              <h5>Jumlah Interaksi Diberikan</h5>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Jumlah Interaksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $n = 0;
                  @endphp
                  @foreach ($interaksiDiberikan as $iD)
                    @php
                      $n++;
                    @endphp
                  <tr>
                    <th scope="row">{{ $n }}</th>
                    <td>{{ $iD->asal }}</td>
                    <td>{{ $iD->jumlah }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="mt-4 mb-4 col-sm-6">
          <div class="card">
            <div class="card-header">
              <h5>Jumlah Interaksi Diterima</h5>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Jumlah Interaksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $n = 0;
                  @endphp
                  @foreach ($interaksiDiterima as $itrim)
                    @php
                      $n++;
                    @endphp
                  <tr>
                    <th scope="row">{{ $n }}</th>
                    <td>{{ $itrim->tujuan }}</td>
                    <td>{{ $itrim->jumlah }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="mt-4 mb-4">
          <div class="card">
            <div class="card-header">
              <h5>Spike dan Linchpin</h5>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Spike</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $n = 0;
                  @endphp
                  @foreach ($interaksiDiberikan as $iD)
                    @php
                      $n++;
                    @endphp
                  <tr>
                    <th scope="row">{{ $n }}</th>
                    <td>{{ $iD->asal }}</td>
                    <td>{{ $iD->jumlah }}</td>
                    @if($n == 1)
                      <td><button class="btn btn-primary btn-sm">Linchpin</button></td>
                    @else
                      <td></td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @else
        <h5 class="text-center mt-4">Interaksi antara Pelanggan dengan Pelanggan Belum Diisi</h5>
    @endif
  </div>
  <div class="border-bottom">
    <h3 class="text-center mt-3">5. Peta Model Bisnis Platform</h3>
    @if($countInteraksi > 0)
      <div class="row text-center"> 
          <div class="card mt-4 mb-4">
            <div class="card-header">
              <p>Gambar Peta Model Bisnis Platform {{ $platform->nama }}</p>
            </div>
            <div class="card-body">
            </div>
          </div>
      </div>
      @else
        <h5 class="text-center mt-4">Interaksi antara Pelanggan dengan Pelanggan Belum Diisi</h5>
    @endif
  </div>
  
  <div class="post-a-comment-area mt-3">
    <h5>Berikan Komentar</h5>
    <!-- Reply Form -->
    <form action="/tambahkomentar/fasilitator" method="post" class="form-horizontal">
        <div class="row">
            @csrf
            <input type="hidden" name="platform_id" value="{{ $platform->id }}">
            <div class="col-12">
                <div class="group">
                    <textarea name="komentar" class="form-control" id="komentar" required></textarea>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    {{-- <label>Komentar</label> --}}
                </div>
            </div>
            <div class="col-12 mt-3">
              <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
            </div>
        </div>
    </form>
  </div>

  <div class="border-bottom">
    <h5 class="title mt-4">Komentar</h5>
    @foreach ($komentar as $k)
            <div class="comment-content d-flex">
                @if($k->user_id!='')
                  <div class="comment-meta border-bottom mb-3">
                      <p>{{ $k->user->name }} (Klien) | {{ $k->created_at->diffForHumans() }} </p>
                      <p>{{ $k->komentar }}</p>
                  </div>
                @elseif($k->fasilitator!='')
                  <div class="comment-meta border-bottom mb-3">
                    <p>{{ $k->fasilitator->name }} | {{ $k->created_at->diffForHumans() }} </p>
                    <p>{{ $k->komentar }}</p>
                    <form action="/hapuskomentar{{ $k->id }}/fasilitator" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-link" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                    </form>
                  </div>
                @endif
            </div>
    @endforeach
</div>
</div>
</main>

@endsection
