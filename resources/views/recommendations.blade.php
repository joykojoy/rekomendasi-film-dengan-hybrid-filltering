@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex">
    <!-- Main Content -->
    <div class="flex-grow-1 bg-dark text-white">
        <div class="container py-5">
            <h2 class="text-warning mb-4">Recommendations</h2>

            <div class="row">
                @foreach ($films as $film)
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

            <!-- Pagination -->
            <div class="mt-4">
                {{ $films->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
