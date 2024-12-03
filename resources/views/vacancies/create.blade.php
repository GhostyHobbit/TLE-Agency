<x-app-layout>

    <div class="max-w-2xl mx-auto p-4 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Maak een vacature</h1>

        <form action="{{ route('vacancies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Hidden Employer ID -->
            <input type="hidden" name="employer_id" value="1">

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Vacature titel</label>
                <input type="text" name="name" id="name"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                       placeholder="Voer hier de vacature titel in" required>
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Hours -->
            <div class="mb-4">
                <label for="hours" class="block text-sm font-medium text-gray-700">Werk uren</label>
                <input type="number" name="hours" id="hours"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                       placeholder="Voer de uren per week in"required>
                @error('hours')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Salary -->
            <div class="mb-4">
                <label for="salary" class="block text-sm font-medium text-gray-700">uurloon</label>
                <input type="number" name="salary" id="salary" step="0.01"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                       placeholder="Voer een uurloon in" required>
                @error('salary')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Locatie</label>
                <input type="text" name="location" id="location"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                       placeholder="Voer een locatie in" required>
                @error('location')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving</label>
                <textarea name="description" id="description" rows="5"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                          placeholder="Voer de baan omschrijving in" required></textarea>
                @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Picture -->
            <div class="mb-4">
                <label for="picture" class="block text-sm font-medium text-gray-700">Foto</label>
                <input type="file" name="picture" id="picture"
                       class="mt-1 block w-full text-sm text-gray-700 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       accept="image/*">
                @error('picture')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Plaats de vacature
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
