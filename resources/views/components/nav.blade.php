<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Open Hiring</title>
</head>
<body class="bg-cream">
<nav class="p-4 bg-mossFoot flex justify-between items-center rounded-b-lg">
    <!-- Logo -->
    <img src="{{ asset('images/OpenHiring.png') }}" alt="Site Logo" class="h-14 w-auto">

    <!-- Menu -->
    <ul class="inline-block ml-4 mt-2 md:mt-0">
        <li class="inline">
            <a href="#" class="text-yellow font-medium text-lg transition-colors">Menu</a>
        </li>
    </ul>
</nav>
<main class="min-h-[82vh]">
    {{ $slot }}
</main>
<footer class="p-4 bg-mossFoot rounded-t-lg">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div>
            <p class="text-yellow font-bold mb-2">Voor werkzoekenden</p>
            <ul>
                <li>
                    <a href="#" class="text-[#D1D5DB] font-medium transition-colors">Vind een baan</a>
                </li>
                <li>
                    <a href="#" class="text-[#D1D5DB] font-medium transition-colors">Veelgestelde vragen</a>
                </li>
            </ul>
        </div>
        <div>
            <p class="text-yellow font-bold mb-2">Voor werkgevers</p>
            <ul>
                <li>
                    <a href="#" class="text-[#D1D5DB] font-medium transition-colors">Spelregels</a>
                </li>
                <li>
                    <a href="#" class="text-[#D1D5DB] font-medium transition-colors">Veelgestelde vragen</a>
                </li>
            </ul>
        </div>
        <div>
            <p class="text-yellow font-bold mb-2">Over Open Hiring</p>
            <ul>
                <li>
                    <a href="#" class="text-[#D1D5DB] font-medium transition-colors">Ontstaan</a>
                </li>
                <li>
                    <a href="#" class="text-[#D1D5DB] font-medium transition-colors">Privacybeleid</a>
                </li>
            </ul>
        </div>
        <div>
            <p class="text-yellow font-bold mb-2">Volg ons op</p>
            <ul>
                <li>
                    <a href="#" class="text-[#D1D5DB] font-medium transition-colors">LinkedIn</a>
                </li>
                <li>
                    <a href="#" class="text-[#D1D5DB] font-medium transition-colors">Instagram</a>
                </li>
                <li>
                    <a href="#" class="text-[#D1D5DB] font-medium transition-colors">Facebook</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="flex justify-end mt-8">
        <img src="{{ asset('images/OpenHiring.png') }}" alt="Site Logo" class="h-[20vh] w-auto p-4">
    </div>
</footer>
</body>
</html>
