<x-nav>

    <form id="search-form" class="m-4">
        <label for="search" class="block text-sm font-medium text-[#2E342A]">Zoek:</label>
        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Zoek naar vacatures" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-2 border-[#2E342A] focus:outline-none focus:ring-[#2E342A] focus:border-[#2E342A] sm:text-sm rounded-md bg-[#E2ECC8] text-[#2E342A] placeholder-[#2E342A]">

        <label for="location" class="block text-sm font-medium text-[#2E342A] mt-4">Filter op Locatie:</label>
        <div class="relative">
        <select name="location" id="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-2 border-[#2E342A] focus:outline-none focus:ring-[#2E342A] focus:border-[#2E342A] sm:text-sm rounded-md bg-[#E2ECC8] text-[#2E342A] appearance-none">
            <option value="">Alle locaties</option>
            @foreach($locations as $location)
                <option value="{{ $location->location }}" {{ request('location') == $location->location ? 'selected' : '' }}>{{ $location->location }}</option>
            @endforeach
        </select>
        <svg class="w-5 h-5 transform rotate-180 absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="#AA0160" fill="#AA0160">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7H5z" />
        </svg>
        </div>

        <label for="hours" class="block text-sm font-medium text-[#2E342A] mt-4">Filter op Uren:</label>
        <div class="relative">
        <select name="hours" id="hours" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-2 border-[#2E342A] focus:outline-none focus:ring-[#2E342A] focus:border-[#2E342A] sm:text-sm rounded-md bg-[#E2ECC8] text-[#2E342A] appearance-none">
            <option value="">Alle uren</option>
            @foreach($hoursRanges as $range => $label)
                <option value="{{ $range }}" {{ request('hours') == $range ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        <svg class="w-5 h-5 transform rotate-180 absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="#AA0160" fill="#AA0160">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7H5z" />
        </svg>
        </div>

        <button type="submit" class="px-8 py-2 mt-5 bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex hover:bg-[#7c1a51] active:bg-[#aa0160]">
            <div class="text-[#fbfcf6] text-base font-bold font-['Radikal'] leading-snug">Zoek</div>
        </button>
    </form>

    <div id="vacancies" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
        @foreach($vacancies as $vacancy)
            <a href="{{ route('vacancies.show', $vacancy->id) }}" class="block bg-[#E2ECC8] border border-[#2E342A] shadow-md rounded-lg p-4 flex justify-between items-center">
                <div class="flex-1">
                    <h3 class="text-[#2E342A] text-xl font-bold mb-2">{{ $vacancy->name }}</h3>
                    <p class="text-[#2E342A] mb-2">Locatie: {{ $vacancy->location }}</p>
                    <p class="text-[#2E342A] mb-2">Uren: {{ $vacancy->hours }} uur</p>
                    <p class="text-[#2E342A] mb-2">Uurloon: €{{ $vacancy->salary }} per uur</p>
                </div>
                @if($vacancy->path)
                    <img src="{{ asset('storage/' . $vacancy->path) }}" alt="{{ $vacancy->employer->company->name }} logo" class="w-24 h-24 mr-8 rounded-md">
                @endif
            </a>
        @endforeach
    </div>
    @vite('resources/js/filter.js')
</x-nav>
