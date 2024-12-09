<x-nav>
    <form id="filter-form" class="m-4">
        <label for="location" class="block text-sm font-medium text-[#2E342A]">Filter by Location:</label>
        <select name="location" id="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-[#2E342A] focus:outline-none focus:ring-[#2E342A] focus:border-[#2E342A] sm:text-sm rounded-md bg-[#E2ECC8] text-[#2E342A]">
            <option value="">Alle locaties</option>
            @foreach($locations as $location)
                <option value="{{ $location->location }}" {{ request('location') == $location->location ? 'selected' : '' }}>{{ $location->location }}</option>
            @endforeach
        </select>

        <label for="hours" class="block text-sm font-medium text-[#2E342A] mt-4">Filter by Hours:</label>
        <select name="hours" id="hours" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-[#2E342A] focus:outline-none focus:ring-[#2E342A] focus:border-[#2E342A] sm:text-sm rounded-md bg-[#E2ECC8] text-[#2E342A]">
            <option value="">Alle uren</option>
            @foreach($hoursRanges as $range => $label)
                <option value="{{ $range }}" {{ request('hours') == $range ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>

        <button type="submit" class="px-8 py-2 mt-5 bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex hover:bg-[#7c1a51] active:bg-[#aa0160]">
            <div class="text-[#fbfcf6] text-base font-bold font-['Radikal'] leading-snug">Filter</div>
        </button>
    </form>

    <div id="vacancies" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
        @foreach($vacancies as $vacancy)
            <a href="{{ route('vacancies.show', $vacancy->id) }}" class="block bg-[#E2ECC8] border border-[#2E342A] shadow-md rounded-lg p-4 flex justify-between items-center">
                <div class="flex-1">
                    <h3 class="text-[#2E342A] text-xl font-bold mb-2">{{ $vacancy->name }}</h3>
                    <p class="text-[#2E342A] mb-2">Location: {{ $vacancy->location }}</p>
                    <p class="text-[#2E342A] mb-2">Hours: {{ $vacancy->hours }}</p>
                    <p class="text-[#2E342A] mb-2">Salary: {{ $vacancy->salary }}</p>
                </div>
                @if($vacancy->path)
                    <img src="{{ asset('storage/' . $vacancy->path) }}" alt="{{ $vacancy->employer->company->name }} logo" class="w-24 h-24 mr-8 rounded-md">
                @endif
            </a>
        @endforeach
    </div>
    @vite('resources/js/filter.js')
</x-nav>
