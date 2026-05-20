<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Song | VibeTune</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* This ensures the dropdown arrow is visible even with appearance-none */
        select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%231DB954' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 1rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
    </style>
</head>
<body class="bg-[#121212] text-white min-h-screen flex items-center justify-center p-6 font-sans">

    <div class="max-w-lg w-full bg-[#181818] rounded-3xl p-10 shadow-2xl border border-white/5 relative">
        
        <div class="flex items-center justify-between mb-10">
            <div>
                <h2 class="text-3xl font-black italic tracking-tighter">Edit <span class="text-[#1DB954]">Vibe</span></h2>
                <p class="text-[10px] text-gray-500 uppercase tracking-widest mt-1">Modifying: {{ $song->title }}</p>
            </div>
            <a href="{{ route('songs.index') }}" class="text-gray-500 hover:text-white transition-all hover:rotate-90 duration-300 text-3xl">&times;</a>
        </div>

        <form action="{{ route('songs.update', $song->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 px-1">Song Title</label>
                    <input type="text" name="title" value="{{ $song->title }}" 
                           class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] focus:bg-[#2a2a2a] transition-all outline-none font-bold text-sm" required>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 px-1">Artist Name</label>
                    <input type="text" name="artist" value="{{ $song->artist }}" 
                           class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] focus:bg-[#2a2a2a] transition-all outline-none font-bold text-sm" required>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 px-1">Genre</label>
                    <select name="genre" class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] focus:bg-[#2a2a2a] transition-all outline-none cursor-pointer font-bold text-sm">
                        <option value="Pop" {{ $song->genre == 'Pop' ? 'selected' : '' }}>Pop</option>
                        <option value="Hip Hop" {{ $song->genre == 'Hip Hop' ? 'selected' : '' }}>Hip Hop</option>
                        <option value="Rock" {{ $song->genre == 'Rock' ? 'selected' : '' }}>Rock</option>
                        <option value="Lofi" {{ $song->genre == 'Lofi' ? 'selected' : '' }}>Lofi</option>
                    </select>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 px-1">Description</label>
                    <textarea name="description" rows="3" 
                              class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] focus:bg-[#2a2a2a] transition-all outline-none resize-none font-medium text-sm leading-relaxed" 
                              placeholder="Update the story behind this song...">{{ $song->description }}</textarea>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 px-1">Update Cover Image</label>
                    <div class="flex items-center gap-5 bg-[#242424] p-4 rounded-xl border border-white/5">
                        @if($song->cover_image)
                            <div class="relative group shrink-0">
                                <img src="{{ asset('storage/' . $song->cover_image) }}" class="w-16 h-16 rounded-lg shadow-lg object-cover border border-white/10">
                                <div class="absolute inset-0 bg-[#1DB954]/80 rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    <span class="text-[8px] font-black text-black text-center px-1">CURRENT</span>
                                </div>
                            </div>
                        @else
                            <div class="w-16 h-16 bg-[#121212] rounded-lg flex items-center justify-center text-2xl border border-white/5">♫</div>
                        @endif
                        
                        <div class="flex flex-col gap-1 w-full">
                            <input type="file" name="cover_image" class="block w-full text-xs text-gray-400
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-[10px] file:font-black
                                file:bg-[#333] file:text-white
                                hover:file:bg-[#1DB954] hover:file:text-black
                                file:transition-all cursor-pointer">
                            <p class="text-[8px] text-gray-600 uppercase tracking-widest">JPG, PNG, WEBP (MAX 2MB)</p>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full bg-[#1DB954] text-black font-black py-4 rounded-full mt-6 shadow-xl shadow-[#1DB954]/10 hover:shadow-[#1DB954]/20 hover:scale-[1.02] active:scale-95 transition-all transform uppercase tracking-[0.2em] text-xs">
                Update Song Details
            </button>
        </form>

        <div class="text-center mt-8">
            <a href="{{ route('songs.index') }}" class="text-gray-500 hover:text-white transition-colors text-[10px] font-black uppercase tracking-[0.2em]">Discard Changes</a>
        </div>
    </div>

</body>
</html>