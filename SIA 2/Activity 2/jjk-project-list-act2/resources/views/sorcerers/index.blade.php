@extends('layouts.app')
@section('title', 'Sorcerer Registry')

@section('content')
<div class="mb-10 text-center">
    <h2 class="text-xl text-slate-400 italic font-light uppercase tracking-widest">Classified Sorcerers</h2>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($sorcerers as $sorcerer)
    <div class="group bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden hover:border-red-600 transition-all duration-500 shadow-2xl flex flex-col">
        <div class="aspect-[4/5] overflow-hidden bg-zinc-800">
            <img src="{{ asset($sorcerer->image_url) }}" 
                 alt="{{ $sorcerer->name }}" 
                 class="w-full h-full object-cover object-top group-hover:scale-110 transition duration-700">
        </div>
        
        <div class="p-6 flex-grow flex flex-col">
            <div class="flex justify-between items-start mb-2">
                <h3 class="text-2xl font-bold text-white leading-tight uppercase">{{ $sorcerer->name }}</h3>
                <span class="text-[10px] bg-black text-red-500 px-2 py-1 rounded border border-red-900 font-bold uppercase tracking-tighter">
                    {{ $sorcerer->grade }}
                </span>
            </div>
            <p class="text-slate-500 text-xs mb-6 uppercase font-semibold tracking-tighter">{{ $sorcerer->affiliation }}</p>
            
            <a href="{{ route('sorcerers.show', $sorcerer->id) }}" 
               class="mt-auto block w-full text-center bg-red-700 hover:bg-red-600 text-white font-bold py-3 rounded-xl transition duration-200 uppercase tracking-widest text-sm">
                View Profile
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection