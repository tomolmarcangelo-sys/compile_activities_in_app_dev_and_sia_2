<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VibeTune | Add New Vibe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Dropdown Arrow */
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
<body class="bg-[#121212] text-white flex justify-center items-center min-h-screen p-6 font-sans">

    <div class="bg-[#181818] p-10 rounded-3xl w-full max-w-lg shadow-2xl border border-white/5">
        
        <div class="mb-10 text-center">
            <h2 class="text-4xl font-black text-[#1DB954] tracking-tighter italic">New Vibe</h2>
            <p class="text-[10px] text-gray-500 uppercase tracking-[0.3em] mt-2">Add a fresh track to your collection</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl">
                <ul class="list-disc list-inside text-xs text-red-500 font-bold">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('songs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 px-1">Song Title</label>
                <input type="text" name="title" value="{{ old('title') }}" 
                       class="w-full bg-[#242424] border border-transparent text-white rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] focus:bg-[#2a2a2a] outline-none transition-all font-bold text-sm" 
                       placeholder="e.g. Blinding Lights" required>
            </div>
            
            <div>
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 px-1">Artist</label>
                <input type="text" name="artist" value="{{ old('artist') }}" 
                       class="w-full bg-[#242424] border border-transparent text-white rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] focus:bg-[#2a2a2a] outline-none transition-all font-bold text-sm" 
                       placeholder="e.g. The Weeknd" required>
            </div>
            
            <div>
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 px-1">Genre</label>
                <select name="genre" class="w-full bg-[#242424] border border-transparent text-white rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] focus:bg-[#2a2a2a] outline-none transition-all cursor-pointer font-bold text-sm">
                    <option value="Pop" {{ old('genre') == 'Pop' ? 'selected' : '' }}>Pop</option>
                    <option value="Hip Hop" {{ old('genre') == 'Hip Hop' ? 'selected' : '' }}>Hip Hop</option>
                    <option value="Rock" {{ old('genre') == 'Rock' ? 'selected' : '' }}>Rock</option>
                    <option value="Lofi" {{ old('genre') == 'Lofi' ? 'selected' : '' }}>Lofi</option>
                </select>
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 px-1">Description</label>
                <textarea name="description" rows="3" 
                          class="w-full bg-[#242424] border border-transparent text-white rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] focus:bg-[#2a2a2a] outline-none transition-all resize-none font-medium text-sm leading-relaxed" 
                          placeholder="What's the story behind this vibe?">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 px-1">Cover Image</label>
                <div class="bg-[#242424] p-4 rounded-xl border border-white/5">
                    <input type="file" name="cover_image" 
                           class="block w-full text-xs text-gray-400
                                  file:mr-4 file:py-2 file:px-6
                                  file:rounded-full file:border-0
                                  file:text-[10px] file:font-black
                                  file:bg-[#333] file:text-white
                                  hover:file:bg-[#1DB954] hover:file:text-black
                                  file:transition-all cursor-pointer">
                    <p class="text-[8px] text-gray-600 uppercase tracking-widest mt-2 px-1">JPG, PNG, WEBP (MAX 2MB)</p>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-[#1DB954] text-black font-black py-4 rounded-full shadow-xl shadow-[#1DB954]/10 hover:shadow-[#1DB954]/20 hover:scale-[1.02] active:scale-95 transition-all transform uppercase tracking-[0.2em] text-xs">
                    Save to Playlist
                </button>
                
                <div class="text-center mt-6">
                    <a href="{{ route('songs.index') }}" class="text-gray-500 hover:text-white text-[10px] font-black uppercase tracking-[0.2em] transition-colors">
                        Cancel & Return
                    </a>
                </div>
            </div>
        </form>
    </div>

</body>
</html>