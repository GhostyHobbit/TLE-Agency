<x-nav>
    <form method="GET" action="{{ route('vacancies.index') }}" class="mb-4">
        <label for="location" class="block text-sm font-medium text-gray-700">Filter by Location:</label>
        <select name="location" id="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            <option value="">All Locations</option>
            @foreach($locations as $location)
                <option value="{{ $location->location }}" {{ request('location') == $location->location ? 'selected' : '' }}>{{ $location->location }}</option>
            @endforeach
        </select>

        <label for="hours" class="block text-sm font-medium text-gray-700 mt-4">Filter by Hours:</label>
        <select name="hours" id="hours" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            <option value="">All Hours</option>
            @foreach($hours as $hour)
                <option value="{{ $hour->hours }}" {{ request('hours') == $hour->hours ? 'selected' : '' }}>{{ $hour->hours }}</option>
            @endforeach
        </select>

        <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">Filter</button>
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
                    <img src="{{ asset('storage/' . $vacancy->path) }}" alt="Vacancy Image" class="w-24 h-24 mr-8 rounded-md">
                @endif
            </a>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $vacancies->links() }}
    </div>
    <script src="{{ asset('js/infiniteScroll.js') }}"></script>
</x-nav>
