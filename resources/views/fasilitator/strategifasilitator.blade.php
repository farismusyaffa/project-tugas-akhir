@extends('layouts.main2')

@section('container')
<main>
  <div class="text-center">
    <h1 class="display-5 fw-bold">Strategi Platform {{ $platform->nama }}!</h1>
    <div class="col-lg-6 mx-auto">
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-3 pt-3 pb-4 border-bottom">
        <a href="/strategifasilitator/{{ $platform->id }}" class="btn btn-primary"><i class="bi bi-arrow-left-right"></i> Strategi</a>
        <a href="/indikatorfasilitator/{{ $platform->id }}" class="btn btn-primary"><i class="bi bi-gear"></i> Indikator</a>
        <a href="/dashboardfasilitator/{{ $platform->id }}" class="btn btn-primary"><i class="bi bi-bar-chart"></i> Dashboard</a>
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
            <p class="card-header text-center">Klien : {{ $platform->user->name }} </p>
            <div class="card-body text-left row">
              <table class="table table-borderless table-sm col-6">
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td>{{ $platform->user->email }}</td>
                </tr>
                <tr>
                  <td>No. Tepl/HP</td>
                  <td>:</td>
                  <td>{{ $platform->user->noHP }}</td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td>{{ $platform->user->jeniskelamin }}</td>
                </tr>
              </table>
              <table class="table table-borderless table-sm col-6">
                <tr>
                  <td>Tempat dan Tanggal Lahir</td>
                  <td>:</td>
                  <td>{{ $platform->user->tempatlahir }}, {{ $platform->user->tanggallahir }}</td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td>{{ $platform->user->alamat }}</td>
                </tr>
              </table>
            </div>
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
              <table class="table table-striped table-hover table-sm">
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
                <table class="table table-striped table-hover table-sm">
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
                <table class="table table-striped table-hover table-sm">
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
                <table class="table table-striped table-hover table-sm">
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
              <table class="table table-striped table-hover table-sm">
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
              <table class="table table-striped table-hover table-sm">
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
              <table class="table table-striped table-hover table-sm">
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
                  @foreach ($interaksiDiterima as $iD)
                    @php
                      $n++;
                    @endphp
                  <tr>
                    <th scope="row">{{ $n }}</th>
                    <td>{{ $iD->tujuan }}</td>
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
      <div class="mx-auto"> 
          <div class="card mt-4 mb-4 text-center">
            <div class="card-body">
              <canvas id="canvas">
              </canvas>
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
                    <form action="/hapuskomentar/{{ $k->id }}/fasilitator" method="post" class="d-inline">
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
<script>
  var canvas = document.getElementById('canvas');
  var ctx = canvas.getContext('2d');
  canvas.height = 800;
  canvas.width = 1000;
  function draw() {
    if (canvas.getContext) {
      var ro =  0.785;
      
      ctx.translate(canvas.width/2, canvas.height/2);
      ctx.save();
      var circle = new Path2D();
      circle.arc(0, 0, 50, 0, 2 * Math.PI);
      ctx.stroke(circle);

      ctx.font = '14px serif';
      ctx.fillText({!! json_encode($platform -> nama) !!}, -25, 0);
      ctx.font = '11px serif';
      ctx.fillText('(Platform)', -25, 10);
      ctx.restore();
      
      const tipepelanggans = {!! json_encode($tipepelanggan) !!};
      const idpelanggans = {!! json_encode($idpelanggan) !!};

      const idtujuans = {!! json_encode($idtujuan) !!};
      const valuetoPels = {!! json_encode($valuetoPel) !!};
      const monetertoPels = {!! json_encode($monetertoPel) !!};

      const idasals = {!! json_encode($idasal) !!};
      const valuetoPls = {!! json_encode($valuetoPl) !!};
      const monetertoPls = {!! json_encode($monetertoPl) !!};

      const asalpelanggans = {!! json_encode($asalpelanggan) !!};
      const tujuanpelanggans = {!! json_encode($tujuanpelanggan) !!};
      const values = {!! json_encode($value) !!};
      const moneters = {!! json_encode($moneter) !!};

      const spikepelanggans = {!! json_encode($spikepelanggan) !!};
      const spikes = {!! json_encode($spike) !!};

      if (tipepelanggans.length <= 4){
        var sin = Math.sin(Math.PI / 2);
        var cos = Math.cos(Math.PI / 2);
      }
      if (tipepelanggans.length > 4){
        var sin = Math.sin(Math.PI / 4);
        var cos = Math.cos(Math.PI / 4);
      }

      for (var i = 0; i < tipepelanggans.length; i++) {
       
        ctx.lineWidth = 1;
        ctx.moveTo(70, -5);
        ctx.lineTo(280 , -5);
        ctx.stroke();
        ctx.moveTo(70, 5);
        ctx.lineTo(280 , 5);
        ctx.stroke();
        ctx.font = '12px serif';
        ctx.fillText(tipepelanggans[i], 315, -5);
        ctx.font = '10px serif';
        ctx.fillText('untuk Platform', 190, 20);
        ctx.fillText('untuk Pelanggan', 190, -15);

        for (var j=0; j < idtujuans.length; j++){
          if (idtujuans[j] === idpelanggans[i]) {
            if(monetertoPels[j] === 'Iya'){
              ctx.font = '11px serif';
              ctx.fillText('nilai: ' + valuetoPels[j] + ' (Rp)', 190, -25);
            }
            else{
              ctx.font = '11px serif';
              ctx.fillText('nilai: ' + valuetoPels[j], 190, -25);
            }
            j = idtujuans.length;
          }
        }

        for (var k=0; k < idasals.length; k++){
          if (idasals[k] === idpelanggans[i]) {
            if(monetertoPls[k] === 'Iya'){
              ctx.font = '11px serif';
              ctx.fillText('nilai: ' + valuetoPls[k] + ' (Rp)', 190, 30);
              for (var l=0; l < asalpelanggans.length; l++){
                if (asalpelanggans[l] === tipepelanggans[i]) {
                  if(moneters[l] === 'Iya'){
                    ctx.beginPath();
                    ctx.lineWidth = 1;
                    ctx.moveTo(290, 0);
                    ctx.lineTo(340, -50);
                    ctx.lineTo(390, 0);
                    ctx.lineTo(340, 50);
                    ctx.closePath();
                    ctx.stroke()
                    ctx.font = '11px serif';
                    ctx.fillText('untuk ' + tujuanpelanggans[l], 80, 20);
                    ctx.fillText('nilai: ' + values[l] + ' (Rp)', 80, 30);
                  }
                  else{
                    ctx.beginPath();
                    ctx.lineWidth = 1;
                    ctx.moveTo(290, 0);
                    ctx.lineTo(340, -50);
                    ctx.lineTo(390, 0);
                    ctx.lineTo(340, 50);
                    ctx.closePath();
                    ctx.stroke()
                    ctx.font = '11px serif';
                    ctx.fillText('untuk ' + tujuanpelanggans[l], 80, 20);
                    ctx.fillText('nilai: ' + values[l], 80, 30);
                  }
                  l = asalpelanggans.length;
                }
                else{
                    ctx.beginPath();
                    ctx.lineWidth = 1;
                    ctx.moveTo(290, 0);
                    ctx.lineTo(340, -50);
                    ctx.lineTo(390, 0);
                    ctx.lineTo(340, 50);
                    ctx.closePath();
                    ctx.stroke()
                    // l = asalpelanggans.length;
                }
              }
              for (var m=0; m < tujuanpelanggans.length; m++){
                if (tujuanpelanggans[m] === tipepelanggans[i]) {
                  if(moneters[m] === 'Iya'){
                    ctx.font = '11px serif';
                    ctx.fillText('dari ' + asalpelanggans[m], 80, -15);
                    ctx.fillText('nilai: ' + values[m] + ' (Rp)', 80, -25);
                  }
                  else{
                    ctx.font = '11px serif';
                    ctx.fillText('dari ' + asalpelanggans[m], 80, -15);
                    ctx.fillText('nilai: ' + values[m], 80, -25);
                  }
                  m = tujuanpelanggans.length;
                }
              }
            }
            if (monetertoPls[k] === 'Tidak'){
              for (var l=0; l < asalpelanggans.length; l++){
                if (asalpelanggans[l] === tipepelanggans[i]) {
                  if(moneters[l] === 'Iya'){
                    ctx.beginPath();
                    ctx.lineWidth = 1;
                    ctx.moveTo(290, 0);
                    ctx.lineTo(340, -50);
                    ctx.lineTo(390, 0);
                    ctx.lineTo(340, 50);
                    ctx.closePath();
                    ctx.stroke()
                    ctx.font = '11px serif';
                    ctx.fillText('untuk ' + tujuanpelanggans[l], 80, 20);
                    ctx.fillText('nilai: ' + values[l] + ' (Rp)', 80, 30);
                  }
                  else{
                    ctx.strokeRect(290, -30, 100, 60);
                    ctx.font = '11px serif';
                    ctx.fillText('untuk ' + tujuanpelanggans[l], 80, 20);
                    ctx.fillText('nilai: ' + values[l], 80, 30);
                  }
                  l = asalpelanggans.length;
                }
                // else{
                //   ctx.strokeRect(290, -30, 100, 60);
                //   // l = asalpelanggans.length;
                // }
              }
              for (var m=0; m < tujuanpelanggans.length; m++){
                if (tujuanpelanggans[m] === tipepelanggans[i]) {
                  if(moneters[m] === 'Iya'){
                    ctx.font = '11px serif';
                    ctx.fillText('dari ' + asalpelanggans[m], 80, -15);
                    ctx.fillText('nilai: ' + values[m] + ' (Rp)', 80, -25);
                  }
                  else{
                    ctx.font = '11px serif';
                    ctx.fillText('dari ' + asalpelanggans[m], 80, -15);
                  }
                  m = asalpelanggans.length;
                }
              }
              ctx.font = '11px serif';
              ctx.fillText('nilai: ' + valuetoPls[k], 190, 30);
            }
            k = idasals.length;
          }
        }

        for (var n=0; n < spikepelanggans.length; n++){
          if (spikepelanggans[n] === tipepelanggans[i] ){
            ctx.font = '12px serif';
            ctx.fillText('(' + spikes[n] + ' spike)', 315, 5);
            n = spikepelanggans.length;
          }
        }
        ctx.transform(cos, sin, -sin, cos, 0, 0);
      } 
    }
  }
  draw();
</script>
@endsection
