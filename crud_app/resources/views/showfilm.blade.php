<!-- resources/views/films/show.blade.php -->

@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <!-- Gambar dan Rating -->
            <div class="col-md-4">
                @if ($film->gambar)
                    <img src="{{ asset('storage/' . $film->gambar) }}" alt="{{ $film->title }}" class="img-fluid mb-3">
                @else
                    <p>No image available</p>
                @endif
                <p><strong>Rating:</strong> {{ $film->rating }}</p>
            </div>

            <!-- Detail Film -->
            <div class="col-md-8">
                <h1>{{ $film->title }}</h1>
                <p><strong>Genre:</strong> {{ $film->genre }}</p>
                <p><strong>Sinopsis:</strong></p>
                <p class="text-justify">{{ $film->sinopsis }}</p>

                <div class="mt-4">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Film List</a>
                </div>

                <!-- Form Komentar dan Rating -->
                <form action="{{ route('user.rating', $film->id) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="rating">Your Rating</label>
                        <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="comment">Your Comment</label>
                        <textarea name="comment" id="comment" rows="3" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit Rating & Comment</button>
                </form>

                <!-- Komentar yang sudah ada -->
                <div class="mt-4">
                    <h4>Comments</h4>
                    @foreach ($film->userRatings as $rating)
                        <div class="card mt-3">
                            <div class="card-body">
                                <strong>{{ $rating->user->name }}</strong> <span class="text-muted">{{ $rating->created_at->diffForHumans() }}</span>
                                <p>{{ $rating->comment }}</p>
                                <p><strong>Rating:</strong> {{ $rating->rating }} / 5</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
