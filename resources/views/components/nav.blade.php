<?php
   $employee = 1
?>

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
<body class="bg-cream text-mossDark">
<nav class="p-4 bg-mossFoot flex justify-between items-center rounded-b-lg">
    <!-- Logo -->
    <a href="{{ route('welcome') }}">
    <img src="{{ asset('images/openhiring.png') }}" alt="Site Logo" class="h-14 w-auto">
    </a>
    <!-- Menu -->
    <ul class="inline-block ml-4 mt-2 md:mt-0">
        <li class="inline">
            <button id="openModal" class="bg-transparent text-yellow font-medium text-lg">Menu</button>
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
                    <a href="{{ route('vacancies.index') }}" class="text-[#D1D5DB] font-medium transition-colors hover:underline">Vind een baan</a>
                </li>
                <li>
                    <a href="{{ route('privacy') }}" class="text-[#D1D5DB] font-medium transition-colors hover:underline">Uw privacy</a>
                </li>
                <li>
                    <a href="https://www.openhiring.nl/veelgestelde-vragen-van-werkzoekenden" class="text-[#D1D5DB] font-medium transition-colors hover:underline">Veelgestelde vragen</a>
                </li>
            </ul>
        </div>
        <div>
            <p class="text-yellow font-bold mb-2">Voor werkgevers</p>
            <ul>
                <li>
                    <a href="https://www.openhiring.nl/over-open-hiring#de-spelregels-van-open-hiring" class="text-[#D1D5DB] font-medium transition-colors hover:underline">Spelregels</a>
                </li>
                <li>
                    <a href="https://www.openhiring.nl/faq-werkgevers" class="text-[#D1D5DB] font-medium transition-colors hover:underline">Veelgestelde vragen</a>
                </li>
            </ul>
        </div>
        <div>
            <p class="text-yellow font-bold mb-2">Over Open Hiring</p>
            <ul>
                <li>
                    <a href="https://www.openhiring.nl/onstaan" class="text-[#D1D5DB] font-medium transition-colors hover:underline">Ontstaan</a>
                </li>
                <li>
                    <a href="https://www.openhiring.nl/privacy-policy" class="text-[#D1D5DB] font-medium transition-colors hover:underline">Privacybeleid</a>
                </li>
            </ul>
        </div>
        <div>
            <p class="text-yellow font-bold mb-2">Volg ons op</p>
            <ul>
                <li>
                    <a href="https://www.linkedin.com/company/open-hiring-nl/" class="text-[#D1D5DB] font-medium transition-colors hover:underline">LinkedIn</a>
                </li>
                <li>
                    <a href="https://www.instagram.com/openhiring_nl/" class="text-[#D1D5DB] font-medium transition-colors hover:underline">Instagram</a>
                </li>
                <li>
                    <a href="https://www.facebook.com/Openhiringnl" class="text-[#D1D5DB] font-medium transition-colors hover:underline">Facebook</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="flex justify-end mt-8">
        <img src="{{ asset('images/openhiring.png') }}" alt="Site Logo" class="h-[20vh] w-auto p-4">
    </div>
</footer>
<!-- Modal Background -->
<div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center z-50 hidden xl:justify-end">
    <!-- Modal Content -->
    <div class="w-[96vw] m-2 bg-mossLight min-h-[50vh] position-relative rounded-lg xl:w-[30vw]">
        <div class="modal-header  p-4 flex justify-between items-center">
            <h3 class="modal-title text-h3">Menu</h3>
            <button id="closeModal" class="text-black hover:text-gray-700 text-4xl" aria-label="Close">
                &times;
            </button>
        </div>
        <div class="modal-body bg-mossLight p-4">
            <ul>
                <li><a class="text-mossDark font-medium text-lg" href="{{ route('welcome') }}">Home</a></li>
                <li><a class="text-mossDark font-medium text-lg" href="{{ route('vacancies.index') }}">Vacatures</a></li>
                <li><a class="text-navLink" href="{{ route('employers.viewvacancies') }}">Bedrijf vacatures</a></li>
                <li><a class="text-navLink" href="{{ route('employees.viewresponses', $employee) }}">Werknemer ontvangen bericht</a></li>
                <li><a class="text-mossDark font-medium text-lg" href="https://www.openhiring.nl/onstaan">Over Open Hiring</a></li>
                <li><a class="text-mossDark font-medium text-lg" href="{{ route('privacy') }}">Uw privacy</a></li>
                <li><a class="text-mossDark font-medium text-lg" href="{{ route('profile.edit') }}">Profiel</a></li>
            </ul>
        </div>
        <div class="modal-footer py-2 flex justify-center bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] mx-4">
            <button id="closeModalFooter" class="text-cream text-base font-bold font-['Radikal'] leading-snug">Sluiten</button>
        </div>
    </div>
</div>

<script>
    // Get modal elements
    const modal = document.getElementById('myModal');
    const openModalButton = document.getElementById('openModal');
    const closeModalButtons = document.querySelectorAll('#closeModal, #closeModalFooter');

    // Open modal
    openModalButton.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Close modal
    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    });

    // Close modal when clicking outside of it
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
</script>
<x-translate-menu/>
</body>
</html>
