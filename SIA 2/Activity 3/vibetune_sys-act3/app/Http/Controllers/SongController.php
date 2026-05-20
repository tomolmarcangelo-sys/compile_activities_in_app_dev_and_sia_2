<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    /**
     * Display a listing of the songs with search and 8-item pagination.
     */
    public function index(Request $request)
    {
        $query = Song::query();

        // Search logic for title or artist
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('artist', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        // Paginate by 8 to create a 2-row, 4-column layout on large screens
        $songs = $query->orderBy('created_at', 'desc')->paginate(8);
        
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new song.
     */
    public function create() 
    { 
        return view('songs.create'); 
    }

    /**
     * Store a newly created song in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre' => 'required',
            'description' => 'nullable|string|max:1000',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $data = $request->all();

        // Handle Image Upload
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        Song::create($data);

        return redirect()->route('songs.index')->with('success', 'Song added to your vibe!');
    }

    /**
     * Display the specified song.
     */
    public function show(Song $song) 
    { 
        return view('songs.show', compact('song')); 
    }

    /**
     * Show the form for editing the specified song.
     */
    public function edit(Song $song) 
    { 
        return view('songs.edit', compact('song')); 
    }

    /**
     * Update the specified song in storage.
     */
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre' => 'required',
            'description' => 'nullable|string|max:1000',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $data = $request->except('cover_image');

        if ($request->hasFile('cover_image')) {
            // Delete the old image file from storage if it exists
            if ($song->cover_image) {
                Storage::disk('public')->delete($song->cover_image);
            }
            // Store the new image
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $song->update($data);

        return redirect()->route('songs.index')->with('success', 'Playlist updated!');
    }

    /**
     * Remove the specified song from storage.
     */
    public function destroy(Song $song)
    {
        // Delete image file before deleting the record
        if ($song->cover_image) {
            Storage::disk('public')->delete($song->cover_image);
        }
        
        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Song removed.');
    }
}