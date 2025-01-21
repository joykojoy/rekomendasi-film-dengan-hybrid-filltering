@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h2 class="text-warning mb-4">What to watch</h2>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white">Top Picks</h3>
        <a href="{{ route('top-picks') }}" class="text-primary">Get more recommendations &rarr;</a>
    </div>
    <div class="row">
        @foreach ($topPicks as $film)
            <div class="col-md-2 mb-3">
                <div class="card bg-dark text-white border-0">
                    <img src="{{ asset('storage/' . $film->gambar) }}" class="card-img-top" alt="{{ $film->title }}">
                    <div class="card-body p-2">
                        <p class="card-text">
                            <span class="text-warning">&#9733; {{ $film->rating }}</span> <br>
                            {{ $film->title }}
                        </p>
                        <a href="#" class="btn btn-sm btn-outline-primary w-100 mb-2">+ Watchlist</a>
                        <a href="#" class="btn btn-sm btn-outline-light w-100">Trailer</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
