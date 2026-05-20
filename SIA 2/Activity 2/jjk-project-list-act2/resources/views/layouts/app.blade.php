<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | JJK Characters</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Oswald', sans-serif; cursor: crosshair; }
        .group:hover { box-shadow: 0 0 25px rgba(220, 38, 38, 0.4); }
    </style>
</head>
<body class="bg-black text-slate-100 min-h-screen flex flex-col">
    <header class="py-8 border-b border-red-600 shadow-2xl bg-zinc-950">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-bold tracking-tighter text-red-600 uppercase">JJK Anime Characters List</h1>
            <p class="text-slate-500 mt-2 tracking-widest text-sm italic underline decoration-red-900">CURSED ENERGY REGISTRY</p>
        </div>
    </header>

    <main class="container mx-auto py-12 px-4 flex-grow">
        @yield('content')
    </main>

    <footer class="text-center py-10 text-zinc-700 border-t border-zinc-900 bg-zinc-950">
        &copy; 2026 Jujutsu Kaisen Project | Marc Angelo C. Tomol
    </footer>
</body>
</html>