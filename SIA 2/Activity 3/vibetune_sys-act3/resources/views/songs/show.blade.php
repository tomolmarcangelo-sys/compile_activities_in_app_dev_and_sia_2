<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $song->title }} | VibeTune</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#121212] text-white min-h-screen flex items-center justify-center p-6 font-sans">

    <div class="max-w-2xl w-full bg-[#181818] rounded-[2.5rem] overflow-hidden shadow-[0_35px_60px_-15px_rgba(0,0,0,0.5)] p-8 md:p-12 border border-white/5 relative">
        
        <div class="absolute top-8 left-8 z-50">
            <a href="{{ route('songs.index') }}" 
               class="flex items-center justify-center w-10 h-10 bg-[#242424] hover:bg-[#1DB954] text-gray-400 hover:text-black rounded-full transition-colors duration-200 shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
        </div>

        <div class="flex justify-center mb-10 relative">
            <div class="absolute inset-0 bg-[#1DB954]/10 blur-[100px] rounded-full scale-75"></div>
            
            <div class="w-64 h-64 md:w-80 md:h-80 relative z-10">
                @if($song->cover_image)
                    <img src="{{ asset('storage/' . $song->cover_image) }}" 
                         class="w-full h-full object-cover rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.6)] border border-white/10">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-[#242424] to-[#1DB954]/20 rounded-3xl flex items-center justify-center text-8xl shadow-2xl border border-white/5">
                        <span class="opacity-40">♫</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="text-center px-4">
            <h3 class="text-[#1DB954] font-black tracking-[0.3em] mb-3 uppercase text-[10px] md:text-xs">
                {{ $song->artist }}
            </h3>
            
            <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight tracking-tighter">
                {{ $song->title }}
            </h1>
            
            <div class="flex justify-center items-center gap-3 mb-8">
                <span class="inline-block bg-[#1DB954]/10 text-[#1DB954] px-5 py-1.5 rounded-full text-[10px] font-black uppercase tracking-[0.15em] border border-[#1DB954]/20">
                    {{ $song->genre }}
                </span>
                <span class="text-gray-600 font-bold text-xs">•</span>
                <span class="text-gray-500 font-bold text-[10px] uppercase tracking-widest">
                    Added {{ $song->created_at->format('M Y') }}
                </span>
            </div>

            <div class="max-w-md mx-auto bg-[#242424]/50 p-6 rounded-2xl border border-white/[0.03]">
                <p class="text-gray-400 text-sm md:text-base leading-relaxed italic">
                    "{{ $song->description ?? 'No background story provided for this vibe.' }}"
                </p>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-white/5 flex flex-wrap justify-center items-center gap-4">
            <a href="{{ route('songs.edit', $song->id) }}" 
               class="bg-white text-black px-10 py-4 rounded-full font-black text-xs uppercase tracking-widest hover:scale-105 active:scale-95 transition-all transform shadow-xl">
                Edit Details
            </a>
            
            <form action="{{ route('songs.destroy', $song->id) }}" method="POST" onsubmit="return confirm('Permanently delete this song?')">
                @csrf 
                @method('DELETE')
                <button type="submit" class="bg-[#242424] text-gray-400 hover:text-red-500 px-6 py-4 rounded-full font-black text-xs uppercase tracking-widest transition-all">
                    Delete
                </button>
            </form>
        </div>
    </div>

</body>
</html>