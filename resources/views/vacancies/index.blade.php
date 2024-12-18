<x-nav>
    <form id="search-form" class="m-4">
        <!-- Search Input -->
        <label for="search" class="block text-sm font-medium text-mossFoot">Zoek:</label>
        <input
            type="text"
            name="search"
            id="search"
            value="{{ request('search') }}"
            placeholder="Zoek naar vacatures"
            class="mt-1 block w-full pl-3 pr-10 py-2 border-2 border-mossDark focus:outline-none focus:ring-mossDark focus:border-mossDark sm:text-sm rounded-md bg-mossLight text-mossFoot placeholder-mossFoot"
        />

        <label for="sort" class="block text-sm font-medium text-[#2E342A] mt-4">Sorteer op:</label>
        <div class="relative">
            <select name="sort" id="sort" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-2 border-[#2E342A] focus:outline-none focus:ring-[#2E342A] focus:border-[#2E342A] sm:text-sm rounded-md bg-[#E2ECC8] text-[#2E342A] appearance-none">
                <option value="" disabled selected>Selecteer optie</option>
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Naam (A-Z)</option>
                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Naam (Z-A)</option>
                <option value="salary_desc" {{ request('sort') == 'salary_desc' ? 'selected' : '' }}>Salaris (Hoog-Laag)</option>
                <option value="salary_asc" {{ request('sort') == 'salary_asc' ? 'selected' : '' }}>Salaris (Laag-Hoog)</option>
                <option value="hours_desc" {{ request('sort') == 'hours_desc' ? 'selected' : '' }}>Uren (Hoog-Laag)</option>
                <option value="hours_asc" {{ request('sort') == 'hours_asc' ? 'selected' : '' }}>Uren (Laag-Hoog)</option>
            </select>
            <svg class="w-5 h-5 transform rotate-180 absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="#AA0160" fill="#AA0160">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7H5z" />
            </svg>
        </div>

        <!-- Location Filter -->
        <label for="location" class="block text-sm font-medium text-mossFoot mt-4">Filter op Locatie:</label>
        <div class="relative">
            <select
                name="location"
                id="location"
                class="mt-1 block w-full pl-3 pr-10 py-2 border-2 border-mossDark focus:outline-none focus:ring-mossDark focus:border-mossDark sm:text-sm rounded-md bg-mossLight text-mossFoot appearance-none"
            >
                <option value="">Alle locaties</option>
                @foreach($locations as $location)
                    <option value="{{ $location->location }}" {{ request('location') == $location->location ? 'selected' : '' }}>{{ $location->location }}</option>
                @endforeach
            </select>
            <!-- Custom Dropdown Arrow -->
            <svg class="w-5 h-5 transform rotate-180 absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="#AA0160" fill="#AA0160">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7H5z" />
            </svg>
        </div>

        <!-- Hours Filter -->
        <label for="hours" class="block text-sm font-medium text-mossFoot mt-4">Filter op Uren:</label>
        <div class="relative">
            <select
                name="hours"
                id="hours"
                class="mt-1 block w-full pl-3 pr-10 py-2 border-2 border-mossDark focus:outline-none focus:ring-mossDark focus:border-mossDark sm:text-sm rounded-md bg-mossLight text-mossFoot appearance-none"
            >
                <option value="">Alle uren</option>
                @foreach($hoursRanges as $range => $label)
                    <option value="{{ $range }}" {{ request('hours') == $range ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            <!-- Custom Dropdown Arrow -->
            <svg class="w-5 h-5 transform rotate-180 absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="#AA0160" fill="#AA0160">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7H5z" />
            </svg>
        </div>

        <!-- Search Button -->
        <button
            type="submit"
            class="px-8 py-2 mt-5 bg-violet rounded-2xl border-b-4 border-violetDark text-white font-bold leading-snug hover:bg-violetDark active:bg-violet transition-all"
        >
            Zoek
        </button>
    </form>

    <!-- Vacancies Grid -->
    <div id="vacancies" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
        @foreach($vacancies as $vacancy)
            <a
                href="{{ route('vacancies.show', $vacancy->id) }}"
                class="block bg-mossLight border border-mossDark shadow-md rounded-lg p-4 flex justify-between items-center hover:bg-mossMedium transition-all"
            >
                <div class="flex-1">
                    <h3 class="text-mossFoot text-xl font-bold mb-2">{{ $vacancy->name }}</h3>
                    <p class="text-mossFoot mb-2">Locatie: {{ $vacancy->location }}</p>
                    <p class="text-mossFoot mb-2">Uren: {{ $vacancy->hours }} uur</p>
                    <p class="text-mossFoot mb-2">Uurloon: €{{ $vacancy->salary }} per uur</p>
                </div>
                @if($vacancy->path)
                    <img
                        src="{{ asset('images/' . $vacancy->employer->company->logo_path) }}"
                        alt="{{ $vacancy->employer->company->name }} logo"
                        class="w-24 h-24 mr-8 rounded-md"
                    />
                @endif
            </a>
        @endforeach
    </div>
    @vite('resources/js/filter.js')
</x-nav>
