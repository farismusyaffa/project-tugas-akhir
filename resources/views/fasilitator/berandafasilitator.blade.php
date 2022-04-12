@extends('layouts.main2')

@section('container')
<main>

  <div class="border-bottom">
    <h5 class="display-6 fw-bold text-center">Platform Klien Anda</h5>
      <div class="mx-auto"> 
        @foreach($platforms as $platform)
        <div class="card mt-3 mb-3 card text-center">
            <h5 class="card-header text-center">{{ $platform->nama }}</h5>
            <div class="card-body">
                <p class="card-text">{{ $platform->deskripsi }}</p>
                <a href="/strategifasilitator/{{ $platform->id }}" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left-right"></i> Strategi</a>
                <a href="/indikatorfasilitator/{{ $platform->id }}" class="btn btn-primary btn-sm"><i class="bi bi-gear"></i> Indikator</a>
                <a href="/dashboardfasilitator/{{ $platform->id }}" class="btn btn-primary btn-sm"><i class="bi bi-bar-chart"></i> Dashboard</a>
                <p></p>
                <p>Dibuat : {{ $platform->created_at }} | Diupdate : {{ $platform->updated_at }}</p>
            </div>
                <p class="card-header text-center">Klien : {{ $platform->user->name }} </p>
        </div>
      </div>
        @endforeach
  </div>
</main>

@endsection
