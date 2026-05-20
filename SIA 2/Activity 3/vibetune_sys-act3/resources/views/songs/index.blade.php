<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VibeTune | My Playlist</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom scrollbar for a cleaner look */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #121212; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #1DB954; }
    </style>
</head>
<body class="bg-[#121212] text-white min-h-screen font-sans">

    <nav class="sticky top-0 z-50 bg-black/95 backdrop-blur-md border-b border-white/5 p-4 mb-8">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
            <a href="{{ route('songs.index') }}" class="text-3xl font-black text-[#1DB954] tracking-tighter hover:scale-105 transition transform">
                VibeTune
            </a>

            <form action="{{ route('songs.index') }}" method="GET" class="w-full md:w-1/2 flex items-center gap-2">
                <div class="relative flex-grow">
                    <input type="text" name="search" 
                           class="w-full bg-[#242424] text-white text-sm rounded-full py-3 px-6 border border-transparent focus:outline-none focus:ring-2 focus:ring-[#1DB954] focus:bg-[#2a2a2a] transition-all" 
                           placeholder="Search title or artist..." 
                           value="{{ request('search') }}">
                    
                    @if(request('search'))
                        <a href="{{ route('songs.index') }}" class="absolute right-4 top-3 text-[10px] font-black text-gray-500 hover:text-white transition uppercase mt-0.5">
                            Clear
                        </a>
                    @endif
                </div>
                
                <button type="submit" class="bg-[#242424] hover:bg-[#333] border border-white/5 px-6 py-3 rounded-full text-xs font-black uppercase tracking-widest transition active:scale-95">
                    Search
                </button>
            </form>

            <div class="flex items-center gap-4">
            <a href="{{ route('feedback.create') }}" class="text-[10px] font-black text-gray-400 hover:text-[#1DB954] uppercase tracking-widest transition hidden md:block">
                Vibe Check
            </a>

            <a href="{{ route('songs.create') }}" class="bg-[#1DB954] hover:bg-[#1ed760] text-black font-black py-3 px-8 rounded-full transition-all text-xs uppercase tracking-widest hover:scale-105 active:scale-95 shadow-lg shadow-[#1DB954]/20">
                + Add Song
            </a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 pb-16">
        
        @if(session('success'))
            <div class="max-w-md mx-auto bg-[#1DB954]/10 border border-[#1DB954]/20 text-[#1DB954] px-4 py-3 rounded-xl mb-8 text-center text-sm font-bold animate-pulse">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($songs as $song)
            <div class="bg-[#181818] p-5 rounded-2xl hover:bg-[#282828] transition-all duration-500 group flex flex-col shadow-2xl border border-white/[0.02] hover:border-white/10 hover:-translate-y-1">
                
                <div class="relative mb-5 overflow-hidden rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.5)] aspect-square">
                    @if($song->cover_image)
                        <img src="{{ asset('storage/' . $song->cover_image) }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-700 ease-in-out">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-[#242424] to-[#121212] flex items-center justify-center text-6xl group-hover:text-[#1DB954] transition duration-500">
                            ♫
                        </div>
                    @endif
                    
                    <a href="{{ route('songs.show', $song->id) }}" 
                       class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 backdrop-blur-[2px]">
                        <div class="bg-[#1DB954] p-4 rounded-full shadow-xl transform translate-y-4 group-hover:translate-y-0 transition duration-300">
                            <svg class="w-6 h-6 text-black fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </a>
                </div>
                
                <div class="flex-grow px-1">
                    <h3 class="font-black truncate text-lg tracking-tight mb-1 group-hover:text-[#1DB954] transition-colors">{{ $song->title }}</h3>
                    <p class="text-sm font-bold text-gray-500 truncate mb-4">{{ $song->artist }}</p>
                </div>

                <div class="flex justify-between items-center border-t border-white/5 pt-4 mt-2">
                    <a href="{{ route('songs.edit', $song->id) }}" 
                       class="text-[10px] font-black text-gray-500 hover:text-white transition uppercase tracking-[0.2em]">
                        Edit
                    </a>
                    <form action="{{ route('songs.destroy', $song->id) }}" method="POST" onsubmit="return confirm('Remove this vibe from your list?')">
                        @csrf 
                        @method('DELETE')
                        <button class="text-[10px] font-black text-gray-600 hover:text-red-500 transition uppercase tracking-[0.2em]">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-32 bg-[#181818] rounded-3xl border border-dashed border-white/10">
                <div class="text-6xl mb-4 opacity-20">📭</div>
                <p class="text-gray-500 text-xl font-black italic tracking-tighter">No vibes found in your playlist.</p>
                @if(request('search'))
                    <a href="{{ route('songs.index') }}" class="text-[#1DB954] hover:underline mt-4 inline-block font-bold text-sm font-black uppercase tracking-widest">Show All Songs</a>
                @endif
            </div>
            @endforelse
        </div>

        <div class="mt-16 flex justify-center">
            <div class="bg-[#181818] px-6 py-2 rounded-full border border-white/5 shadow-xl">
                {{ $songs->appends(request()->query())->links() }}
            </div>
        </div>
    </main>
</body>
</html>