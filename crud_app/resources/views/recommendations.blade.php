<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommendations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @extends('layout')

@section('content')

    <div class="container py-5">
        <h2 class="text-warning mb-4">Recommendations</h2>
        
        <div class="row">
            @foreach ($recommendedFilms as $film)
                <div class="col-md-3 mb-3">
                    <div class="card bg-dark text-white border-0">
                        <img src="{{ asset('storage/' . $film->gambar) }}" 
                             class="card-img-top" 
                             alt="{{ $film->title }}"
                             style="height: 300px; object-fit: cover; width: 100%;">
                        <div class="card-body p-2">
                            <p class="card-text">
                                <span class="text-warning">&#9733; {{ $film->rating }}</span> <br>
                                {{ $film->title }} <br>
                                <small>Hybrid Score: {{ $hybridScores[$film->id] ?? 0 }}</small>
                            </p>
                            <a href="{{ route('films.show', $film->id) }}" class="btn btn-sm btn-outline-primary w-100 mb-2">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $recommendedFilms->links() }}
        </div>
    </div>
@endsection


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
