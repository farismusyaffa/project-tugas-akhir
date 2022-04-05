@extends('layouts.main2')

@section('container')
<main>
  {{-- <h1 class="visually-hidden">Heroes examples</h1> --}}
  {{-- @foreach($platform as $p) --}}
  <div class="text-center">
    <h1 class="display-5 fw-bold">Indikator Platform {{ $platform->nama }}</h1>
    <p>Klien : {{ $platform->user->name }}</p>
    <div class="col-lg-6 mx-auto border-bottom"">
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-3 pt-3 pb-4">
          <a href="/strategifasilitator/{{ $platform->id }}" class="btn btn-primary"><i class="bi bi-info-square"></i> Strategi</a>
          <a href="/indikatorfasilitator/{{ $platform->id }}" class="btn btn-primary"><i class="bi bi-info-square"></i> Indikator</a>
          <a href="/dashboardfasilitator/{{ $platform->id }}" class="btn btn-primary"><i class="bi bi-info-square"></i> Dashboard</a>
        </div> 
    </div>
  </div>

  <div>
    <div class="mx-auto"> 
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Indikator</th>
            <th scope="col">Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          @php
              $n = 0;
          @endphp
          @foreach ($indikator as $i)
            @php
              $n++;
            @endphp
          <tr>
            <th scope="row">{{ $n }}</th>
            <td>{{ $i->nama }}</td>
            <td>{{ $i->deskripsi }}</td>
            <td>
              <a href="/dataindikatorfasilitator/{{ $i->id }}" class="btn btn-primary btn-sm"><i class="bi bi-info-square"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</main>

@endsection
