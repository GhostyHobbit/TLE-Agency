<x-nav>
{{--Info--}}
    <h1 class="text-h1 mx-4 my-2">{{ $vacancy->name }}</h1>
    <div class="flex items-center mx-4 my-2">
        @if($vacancy->path)
            <img src="{{ asset('storage/' . $vacancy->path) }}" alt="{{ $vacancy->employee->company->name }} Logo" class="h-[5vh] w-auto">
        @endif
        <img src="{{ asset('images/OpenHiring.png') }}" alt="{{ $vacancy->employer->company->name }} Logo" class="h-[5vh] w-auto">
        <p class="text-p mx-4">{{ $vacancy->employer->company->name }}</p>
    </div>
    <div class="flex justify-between items-center mx-4">
        <div class="my-2">
            <ul>
                <li class="text-p font-bold">Locatie: {{ $vacancy->location }}</li>
                <li class="text-p font-bold">Uren: {{ $vacancy->hours }} uur</li>
                <li class="text-p font-bold">Uurloon: €{{ $vacancy->salary }} per uur</li>
            </ul>
        </div>
        <div class="bg-mossLight pl-3 pr-3 py-4 rounded-lg my-2">
            <p class="text-p font-bold mb-2">Interesse?</p>
            <div class="w-[40vw] h-[6vh] py-4 bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex hover:bg-[#7c1a51] active:bg-[#aa0160]">
                <a class="text-cream text-base font-bold font-['Radikal'] leading-snug">Schrijf in</a>
            </div>
        </div>
    </div>

{{--Image Banner--}}
    @if($vacancy->path)
        <img src="{{ asset('storage/' . $vacancy->path) }}" alt="Banner-foto-baan" class="h-[5vh] w-auto">
    @endif
    <img src="{{ asset('images/placeholderbanner.jpg') }}" class="h-[25vh] w-[92vw] object-cover mx-4 rounded-lg object-top">

{{--Description--}}
    <div>
        <div id="functionHeader" class="w-[92vw] mx-4 mt-4 bg-mossLight border-2 border-mossDark rounded-lg px-3 py-1 flex justify-between items-center cursor-pointer">
            <h2 class="text-p font-bold text-lg">Over de functie</h2>
            <svg class="w-5 h-5 transform rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="#AA0160" fill="#AA0160">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7H5z" />
            </svg>
        </div>
        <div id="functionDescription" class="w-[92vw] mx-4 border-2 border-mossDark rounded-lg px-3 py-1 hidden">
            <p class="text-p my-2 font-bold">Wat moet u doen?</p>
            <p class="text-p my-2">{{ $vacancy->description }}</p>
            <p class="text-p my-2 font-bold">Uw taken</p>
            <ul class="list-disc list-inside pl-5">
                <li>Vloeren dweilen</li>
                <li>Prullenbakken legen</li>
                <li>Kamers stofzuigen</li>
                <li>Vergelijkbaar werk</li>
            </ul>
            <p class="text-p my-2 font-bold">Kwaliteiten</p>
            <ul class="list-disc list-inside pl-5">
                <li>Fysiek</li>
                <li>Detail gericht</li>
                <li>Gemotiveerd</li>
            </ul>
        </div>

        <div id="offerHeader" class="w-[92vw] mx-4 mt-4 bg-mossLight border-2 border-mossDark rounded-lg px-3 py-1 flex justify-between items-center cursor-pointer">
            <h2 class="text-p font-bold text-lg">Wat bieden wij</h2>
            <svg class="w-5 h-5 transform rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="#AA0160" fill="#AA0160">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7H5z" />
            </svg>
        </div>
        <div id="offerDescription" class="w-[92vw] mx-4 border-2 border-mossDark rounded-lg px-3 py-1 hidden">
            <p class="text-p mt-2 font-bold">Loon</p>
            <ul class="list-disc list-inside pl-5 mb-2">
                <li class="text-p">€{{ $vacancy->salary }} per uur</li>
            </ul>
            <p class="text-p font-bold">Uren</p>
            <ul class="list-disc list-inside pl-5 mb-2">
                <li class="text-p">{{ $vacancy->hours }} uur</li>
            </ul>
            <p class="text-p font-bold">Vakantie dagen</p>
            <ul class="list-disc list-inside pl-5 mb-2">
                <li class="text-p">Onbetaald verlof</li>
            </ul>
        </div>
    </div>

    <div class="my-4 mx-4">
        <p class="text-p font-bold mb-2">Interesse?</p>
        <div class="w-[92vw] h-[8vh] py-4 bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex hover:bg-[#7c1a51] active:bg-[#aa0160]">
            <a class="text-cream text-base font-bold font-['Radikal'] leading-snug">Schrijf in</a>
        </div>
    </div>

{{--Javascript for dropdowns--}}
    <script>
        // Get elements
        const functionHeader = document.getElementById('functionHeader');
        const functionDescription = document.getElementById('functionDescription');

        const offerHeader = document.getElementById('offerHeader');
        const offerDescription = document.getElementById('offerDescription');

        // Toggle function for "Over de functie"
        functionHeader.addEventListener('click', () => {
            functionDescription.classList.toggle('hidden');
        });

        // Toggle function for "Wat bieden wij"
        offerHeader.addEventListener('click', () => {
            offerDescription.classList.toggle('hidden');
        });
    </script>
</x-nav>
