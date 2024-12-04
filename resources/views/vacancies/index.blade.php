<x-nav>
    <div id="vacancies" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
        @foreach($vacancies as $vacancy)
            <div class="bg-[#E2ECC8] border border-[#2E342A] shadow-md rounded-lg p-4">
                <h3 class="text-[#2E342A] text-xl font-bold m-2">{{ $vacancy->name }}</h3>
                <p class="text-[#2E342A] mb-2">Location: {{ $vacancy->location }}</p>
                <p class="text-[#2E342A] mb-2">Hours: {{ $vacancy->hours }}</p>
                <p class="text-[#2E342A] mb-2">Salary: {{ $vacancy->salary }}</p>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $vacancies->links() }}
    </div>
    <script src="{{ asset('js/infiniteScroll.js') }}"></script>
</x-nav>
