@extends('layouts.app')
@section('title', $sorcerer->name)

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('sorcerers.index') }}" class="text-zinc-500 hover:text-red-500 uppercase tracking-widest text-sm flex items-center gap-2 transition">
            <span class="text-xl">&larr;</span> Back to Registry
        </a>
    </div>

    <div class="flex flex-col md:flex-row gap-12 items-center md:items-start bg-zinc-950 p-6 md:p-10 rounded-3xl border border-zinc-900 shadow-2xl">
        <div class="w-full md:w-5/12 rounded-2xl overflow-hidden border-2 border-red-900/30 shadow-[0_0_50px_rgba(220,38,38,0.15)]">
            <img src="{{ asset($sorcerer->image_url) }}" 
                 alt="{{ $sorcerer->name }}" 
                 class="w-full h-auto object-cover">
        </div>

        <div class="w-full md:w-7/12">
            <h1 class="text-6xl md:text-8xl font-bold uppercase text-white leading-none mb-4 tracking-tighter">{{ $sorcerer->name }}</h1>
            
            <div class="inline-block px-6 py-2 mb-8 {{ str_contains($sorcerer->grade, 'Special') ? 'bg-red-600' : 'bg-zinc-700' }}">
                <p class="text-black font-black uppercase italic tracking-wider">{{ $sorcerer->grade }}</p>
            </div>

            <div class="space-y-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="border-l-4 border-red-600 pl-4">
                        <h3 class="text-zinc-500 text-xs uppercase tracking-[0.2em] font-bold mb-1">Affiliation</h3>
                        <p class="text-2xl text-slate-100">{{ $sorcerer->affiliation }}</p>
                    </div>
                    <div class="border-l-4 border-red-600 pl-4">
                        <h3 class="text-zinc-500 text-xs uppercase tracking-[0.2em] font-bold mb-1">Cursed Technique</h3>
                        <p class="text-2xl text-slate-100">{{ $sorcerer->cursed_technique }}</p>
                    </div>
                </div>

                <div class="bg-zinc-900/50 p-6 rounded-xl border border-zinc-800 italic">
                    <h3 class="text-red-500 text-xs uppercase tracking-widest mb-3 font-bold">Character Dossier</h3>
                    <p class="text-zinc-300 text-xl leading-relaxed">
                        "{{ $sorcerer->description }}"
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection