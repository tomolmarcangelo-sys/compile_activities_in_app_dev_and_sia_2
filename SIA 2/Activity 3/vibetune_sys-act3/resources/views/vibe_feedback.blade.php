<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VibeTune | Vibe Check</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#121212] text-white min-h-screen flex items-center justify-center p-6">

    <div class="max-w-xl w-full bg-[#181818] p-10 rounded-[2.5rem] shadow-2xl border border-white/5 relative">
        
        <div class="mb-8 text-center">
            <h2 class="text-4xl font-black text-[#1DB954] italic tracking-tighter">Vibe Check</h2>
            <p class="text-[10px] text-gray-500 uppercase tracking-[0.3em] mt-2 font-bold">Help us improve your playlist</p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-[#1DB954]/10 border border-[#1DB954]/20 text-[#1DB954] rounded-2xl text-center text-xs font-black uppercase tracking-widest animate-bounce">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-2xl">
                <ul class="list-disc list-inside text-[10px] text-red-500 font-black uppercase tracking-wider">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('feedback.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Listener Name</label>
                <input type="text" name="listener_name" value="{{ old('listener_name') }}" 
                       class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] outline-none transition font-bold">
                @error('listener_name') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Email Address</label>
                <input type="email" name="listener_email" value="{{ old('listener_email') }}" 
                       class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] outline-none transition font-bold">
                @error('listener_email') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Vibe Rating (1-5)</label>
                    <input type="number" name="vibe_rating" value="{{ old('vibe_rating') }}" 
                           class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] outline-none transition font-bold">
                    @error('vibe_rating') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Fav Genre</label>
                    <select name="favorite_genre" class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] outline-none transition font-bold cursor-pointer appearance-none">
                        <option value="" disabled selected>Choose...</option>
                        <option value="Pop" {{ old('favorite_genre') == 'Pop' ? 'selected' : '' }}>Pop</option>
                        <option value="Hip Hop" {{ old('favorite_genre') == 'Hip Hop' ? 'selected' : '' }}>Hip Hop</option>
                        <option value="Lofi" {{ old('favorite_genre') == 'Lofi' ? 'selected' : '' }}>Lofi</option>
                        <option value="Rock" {{ old('favorite_genre') == 'Rock' ? 'selected' : '' }}>Rock</option>
                    </select>
                    @error('favorite_genre') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Suggestions</label>
                <textarea name="suggestions" rows="3" 
                          class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] outline-none transition font-medium resize-none">{{ old('suggestions') }}</textarea>
                @error('suggestions') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-[#1DB954] text-black font-black py-4 rounded-full shadow-xl hover:scale-[1.02] active:scale-95 transition transform uppercase tracking-[0.2em] text-xs">
                Submit Feedback
            </button>
        </form>
        
        <div class="mt-8 text-center">
            <a href="{{ route('songs.index') }}" class="text-gray-500 hover:text-white text-[10px] font-black uppercase tracking-widest transition">Back to Playlist</a>
        </div>
    </div>

</body>
</html>