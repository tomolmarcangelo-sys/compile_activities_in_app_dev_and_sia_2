<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VibeCheck | Feedback Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Matching the VibeTune Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #121212; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #1DB954; }
    </style>
</head>
<body class="bg-[#121212] text-white min-h-screen flex items-center justify-center p-6 font-sans">

    <div class="max-w-xl w-full bg-[#181818] p-10 rounded-[2.5rem] shadow-[0_35px_60px_-15px_rgba(0,0,0,0.5)] border border-white/5 relative overflow-hidden">
        
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-[#1DB954]/10 blur-[100px] rounded-full"></div>

        <div class="mb-10 text-center relative z-10">
            <h2 class="text-4xl font-black text-[#1DB954] italic tracking-tighter">Vibe Check</h2>
            <p class="text-[10px] text-gray-500 uppercase tracking-[0.3em] mt-2 font-bold">Feedback Studio</p>
        </div>

        @if(session('success'))
            <div class="mb-8 p-4 bg-[#1DB954]/10 border border-[#1DB954]/20 text-[#1DB954] rounded-2xl text-center text-xs font-black uppercase tracking-widest animate-pulse">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-8 p-5 bg-red-500/10 border border-red-500/20 rounded-2xl">
                <ul class="space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-[10px] text-red-500 font-black uppercase tracking-wider">• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vibe.store') }}" method="POST" class="space-y-6 relative z-10">
            @csrf

            <div>
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Listener Name</label>
                <input type="text" name="full_name" value="{{ old('full_name') }}" 
                       placeholder="Enter your name"
                       class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] focus:bg-[#2a2a2a] outline-none transition font-bold text-sm @error('full_name') border-red-500/50 @enderror">
                @error('full_name') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Email Address</label>
                <input type="email" name="email_address" value="{{ old('email_address') }}" 
                       placeholder="you@example.com"
                       class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] focus:bg-[#2a2a2a] outline-none transition font-bold text-sm">
                @error('email_address') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Vibe Rating (1-10)</label>
                    <input type="number" name="vibe_score" value="{{ old('vibe_score') }}" 
                           placeholder="Score"
                           class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] outline-none transition font-bold text-sm">
                    @error('vibe_score') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Music Genre</label>
                    <div class="relative">
                        <select name="preferred_mood" class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] outline-none transition font-bold text-sm cursor-pointer appearance-none">
                            <option value="" disabled selected>Select...</option>
                            <option value="Phonk" {{ old('preferred_mood') == 'Phonk' ? 'selected' : '' }}>Phonk</option>
                            <option value="Lofi Beats" {{ old('preferred_mood') == 'Lofi Beats' ? 'selected' : '' }}>Lofi Beats</option>
                            <option value="Synthwave" {{ old('preferred_mood') == 'Synthwave' ? 'selected' : '' }}>Synthwave</option>
                            <option value="K-Pop" {{ old('preferred_mood') == 'K-Pop' ? 'selected' : '' }}>K-Pop</option>
                            <option value="Afrobeats" {{ old('preferred_mood') == 'Afrobeats' ? 'selected' : '' }}>Afrobeats</option>
                            <option value="Hyperpop" {{ old('preferred_mood') == 'Hyperpop' ? 'selected' : '' }}>Hyperpop</option>
                            <option value="Drill" {{ old('preferred_mood') == 'Drill' ? 'selected' : '' }}>Drill</option>
                            <option value="Alternative Rock" {{ old('preferred_mood') == 'Alternative Rock' ? 'selected' : '' }}>Alternative Rock</option>
                            <option value="R&B Soul" {{ old('preferred_mood') == 'R&B Soul' ? 'selected' : '' }}>R&B Soul</option>
                            <option value="EDM" {{ old('preferred_mood') == 'EDM' ? 'selected' : '' }}>EDM</option>
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                    @error('preferred_mood') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Tuning Notes (Message)</label>
                <textarea name="message" rows="3" 
                          placeholder="What should we add next to the playlist?"
                          class="w-full bg-[#242424] border border-transparent rounded-xl p-4 focus:ring-2 focus:ring-[#1DB954] outline-none transition font-medium text-sm resize-none italic">{{ old('message') }}</textarea>
                @error('message') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-[#1DB954] hover:bg-[#1ed760] text-black font-black py-4 rounded-full shadow-xl shadow-[#1DB954]/10 hover:scale-[1.02] active:scale-95 transition transform uppercase tracking-[0.2em] text-xs">
                Submit Vibe Check
            </button>
        </form>
        
        <div class="mt-10 pt-6 border-t border-white/5 text-center relative z-10">
            <p class="text-[9px] text-gray-600 font-black uppercase tracking-[0.3em]">
                VibeTune © 2026 • Marc Angelo C. Tomol
            </p>
        </div>
    </div>

</body>
</html>