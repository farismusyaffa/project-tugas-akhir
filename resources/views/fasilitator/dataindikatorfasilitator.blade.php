@extends('layouts.main2')

@section('container')
<main>
  {{-- <h1 class="visually-hidden">Heroes examples</h1> --}}
  {{-- @foreach($platform as $p) --}}
  <div class="text-center">
    <h1 class="display-5 fw-bold">Data Indikator {{ $indikator->nama }}</h1> 
    <div class="col-lg-6 mx-auto border-bottom">
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-3 pt-3 pb-4 border-bottom">
        <a href="/strategifasilitator/{{ $indikator->platform->id }}" class="btn btn-primary"><i class="bi bi-arrow-left-right"></i> Strategi</a>
        <a href="/indikatorfasilitator/{{ $indikator->platform->id }}" class="btn btn-primary"><i class="bi bi-gear"></i> Indikator</a>
        <a href="/dashboardfasilitator/{{ $indikator->platform->id }}" class="btn btn-primary"><i class="bi bi-bar-chart"></i> Dashboard</a>
      </div>   
    </div>
  </div>

  <div class="border-bottom">
    <div class="row text-center">
      <div class="mt-4 mb-4 col-sm-6">
        <div class="card">
          <div class="card-header">
            <h5>Data Indikator</h5>
          </div>
          <div class="card-body">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Data</th>
                  <th scope="col">Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $n = 0;
                @endphp
                @foreach ($dataIndikator as $d)
                  @php
                    $n++;
                  @endphp
                <tr>
                  <th scope="row">{{ $n }}</th>
                  <td>{{ $d->data }}</td>
                  <td>{{ $d->date }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div> 
      <div class="mt-4 mb-4 col-sm-3">
        <div class="card">
          <div class="card-header">
            <h5>Berdasar Bulan</h5>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover table-sm">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Data</th>
                  <th scope="col">Bulan</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $n = 0;
                @endphp
                @foreach ($sumDataBulan as $sDB)
                  @php
                    $n++;
                  @endphp
                <tr>
                  <th scope="row">{{ $n }}</th>
                  <td>{{ $sDB->jumlah }}</td>
                  <td>{{ $sDB->bulan }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="mt-4 mb-4 col-sm-3">
        <div class="card">
          <div class="card-header">
            <h5>Berdasar Tahun</h5>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover table-sm">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Data</th>
                  <th scope="col">Tahun</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $n = 0;
                @endphp
                @foreach ($sumDataTahun as $sDT)
                  @php
                    $n++;
                  @endphp
                <tr>
                  <th scope="row">{{ $n }}</th>
                  <td>{{ $sDT->jumlah }}</td>
                  <td>{{ $sDT->tahun }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
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
