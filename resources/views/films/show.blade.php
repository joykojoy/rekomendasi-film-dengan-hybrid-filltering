@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <!-- Bagian Gambar dan Rating -->
            <div class="col-md-4">
                @if ($film->gambar)
                    <div>
                        <img src="{{ asset('storage/' . $film->gambar) }}" alt="{{ $film->title }}" class="img-fluid mb-3">
                    </div>
                @else
                    <p>No image available</p>
                @endif
                <p><strong>Rating:</strong> {{ $film->rating }}</p>
            </div>

            <!-- Bagian Detail Film -->
            <div class="col-md-8">
                <h1>{{ $film->title }}</h1>
                <p><strong>Genre:</strong> {{ $film->genre }}</p>
                <p><strong>Sinopsis:</strong></p>
                <p class="text-justify">{{ $film->sinopsis }}</p>
                <div class="mt-4">
                    <a href="{{ route('films.index') }}" class="btn btn-secondary">Back to Film List</a>
                    <a href="{{ route('films.edit', $film->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
