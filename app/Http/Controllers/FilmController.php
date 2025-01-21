<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    // Dashboard
    public function dashboard()
{
    // Ambil data untuk top picks (film dengan rating tertinggi)
    $topPicks = Film::orderBy('rating', 'desc')->take(6)->get();

    // Ambil data rekomendasi (film terbaru)
    $recommendations = Film::latest()->take(6)->get();

    return view('dashboard', compact('topPicks', 'recommendations'));
}

public function recommendations()
{
    // Ambil semua data film untuk halaman rekomendasi
    $films = Film::paginate(12);

    return view('recommendations', compact('films'));
}

    // Top Picks
    public function topPicks()
    {
        // Ambil film berdasarkan rating tertinggi
        $films = Film::orderBy('rating', 'desc')->take(12)->get(); // Menampilkan 12 film terbaik
        return view('top-picks', compact('films'));
    }


    // Film List with Search
    public function index(Request $request)
    {
        // Ambil nilai pencarian dari input form
        $search = $request->input('search');
    
        // Ambil data film berdasarkan pencarian judul atau genre
        $films = Film::when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%')
                             ->orWhere('genre', 'like', '%' . $search . '%');
            })
            ->paginate(10); // Menambahkan paginasi untuk hasil yang lebih banyak
    
        return view('films.index', compact('films'));
    }

    // Show Film Detail
    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    // Create New Film
    public function create()
    {
        return view('films.create');
    }

    // Store New Film
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'rating' => 'nullable|numeric|min:0|max:10',
        ]);
    
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('images', 'public');
        }
    
        Film::create($data);
        return redirect()->route('films.index')->with('success', 'Film created successfully.');
    }

    // Edit Film
    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    // Update Film
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'rating' => 'nullable|numeric|min:0|max:10',
        ]);
    
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('images', 'public');
        }
    
        $film->update($data);
        return redirect()->route('films.index')->with('success', 'Film updated successfully.');
    }

    // Delete Film
    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film deleted successfully.');
    }
}
