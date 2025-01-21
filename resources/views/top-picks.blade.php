@extends('layout') <!-- Tempatkan di awal dokumen -->

@section('content') <!-- Mulai konten utama -->
<div class="container-fluid py-5">
    <div class="row">
        <!-- Sidebar -->
        <!-- Main Content -->
        <div class="col-md-9">
            <h2 class="text-warning mb-4">Top Picks</h2>
            <div class="row">
                @foreach ($films as $film)
                    <div class="col-md-4 mb-4">
                        <div class="card bg-dark text-white border-0 h-100">
                            <img src="{{ $film->gambar ? asset('storage/' . $film->gambar) : 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $film->title }}">
                            <div class="card-body p-2 d-flex flex-column">
                                <p class="card-text mb-2">
                                    <span class="text-warning">&#9733; {{ $film->rating }}</span> <br>
                                    {{ $film->title }}
                                </p>
                                <a href="#" class="btn btn-sm btn-outline-primary mb-2 w-100">+ Watchlist</a>
                                <a href="#" class="btn btn-sm btn-outline-light w-100">Trailer</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection <!-- Akhiri konten utama -->
