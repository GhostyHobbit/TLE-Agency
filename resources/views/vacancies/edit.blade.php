<x-nav>
    <!-- Skip to Content Link -->
    <a href="#main-content" class="sr-only focus:not-sr-only">Skip to content</a>

    <div id="main-content" class="max-w-2xl mx-auto p-6 sm:p-8 bg-mossLight shadow-md rounded-lg border border-black mt-8 sm:mt-12 mb-8 sm:mb-12">
        <h1 class="text-2xl font-bold mb-4 text-mossFoot">Bewerk Vacature</h1>

        <form action="{{ route('vacancies.update', $vacancy->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- This is important for the update route -->

            <!-- Hidden Employer ID -->
            <input type="hidden" name="employer_id" value="{{ $vacancy->employer_id }}">

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">
                    Vacature titel <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $vacancy->name) }}" aria-required="true"
                       class="mt-1 block w-full rounded-md border border-black px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                       placeholder="Voer hier de vacature titel in" required>
                @error('name')
                <div role="alert">
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <!-- Hours -->
            <div class="mb-4">
                <label for="hours" class="block text-sm font-medium text-gray-700">
                    Werk uren <span class="text-red-500">*</span>
                </label>
                <input type="number" name="hours" id="hours" value="{{ old('hours', $vacancy->hours) }}" aria-required="true"
                       class="mt-1 block w-full rounded-md border border-black px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                       placeholder="Voer de uren per week in" required>
                @error('hours')
                <div role="alert">
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <!-- Salary -->
            <div class="mb-4">
                <label for="salary" class="block text-sm font-medium text-gray-700">
                    Uurloon <span class="text-red-500">*</span>
                </label>
                <input type="number" name="salary" id="salary" step="0.01" value="{{ old('salary', $vacancy->salary) }}" aria-required="true"
                       class="mt-1 block w-full rounded-md border border-black px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                       placeholder="Voer een uurloon in" required>
                @error('salary')
                <div role="alert">
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">
                    Locatie <span class="text-red-500">*</span>
                </label>
                <input type="text" name="location" id="location" value="{{ old('location', $vacancy->location) }}" aria-required="true"
                       class="mt-1 block w-full rounded-md border border-black px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                       placeholder="Voer een locatie in" required>
                @error('location')
                <div role="alert">
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">
                    Beschrijving <span class="text-red-500">*</span>
                </label>
                <textarea name="description" id="description" rows="5" aria-required="true"
                          class="mt-1 block w-full rounded-md border border-black px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                          placeholder="Voer de baan omschrijving in" required>{{ old('description', $vacancy->description) }}</textarea>
                @error('description')
                <div role="alert">
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <!-- Tasks Table -->
            <div class="mb-6">
                <label for="tasks" class="block text-sm font-medium text-gray-700">
                    Taken <span class="text-red-500">*</span>
                </label>
                <textarea name="tasks" id="tasks" rows="5" aria-required="true"
                          class="mt-1 block w-full rounded-md border border-black px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                          placeholder="Voer een lijst van taken in, gescheiden door nieuwe regels" required>{{ old('tasks', $vacancy->tasks) }}</textarea>
                <p class="text-sm text-gray-500 mt-1">
                    Gebruik elke regel om een taak te vermelden.
                </p>
                @error('tasks')
                <div role="alert">
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <!-- Qualifications List -->
            <div class="mb-6">
                <label for="qualifications" class="block text-sm font-medium text-gray-700">
                    Kwalificaties <span class="text-red-500">*</span>
                </label>
                <textarea name="qualifications" id="qualifications" rows="5" aria-required="true"
                          class="mt-1 block w-full rounded-md border border-black px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                          placeholder="Voer de kwalificaties in, gescheiden door nieuwe regels" required>{{ old('qualifications', $vacancy->qualifications) }}</textarea>
                <p class="text-sm text-gray-500 mt-1">
                    Bijvoorbeeld: Rijbewijs, minimaal 18 jaar, enzovoort.
                </p>
                @error('qualifications')
                <div role="alert">
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <!-- Picture -->
            <div class="mb-4">
                <label for="picture" class="block text-sm font-medium text-gray-700">
                    Foto
                </label>
                <input type="file" name="picture" id="picture" aria-describedby="picture-description"
                       class="mt-1 block w-full text-sm text-gray-700 bg-white px-3 py-2 rounded-md border border-black shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       accept="image/*">
                <p id="picture-description" class="text-sm text-gray-500">Upload een JPG, PNG of GIF bestand.</p>
                @error('picture')
                <div role="alert">
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <!-- Status Selection -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">
                    Status <span class="text-red-500">*</span>
                </label>
                <div class="flex items-center space-x-4 mt-2">
                    <!-- Active Radio Button -->
                    <label for="active" class="flex items-center cursor-pointer">
                        <input type="radio" id="active" name="status" value="active" class="hidden peer" {{ $vacancy->status == 'active' ? 'checked' : '' }}>
                        <span class="peer-checked:bg-green-500 peer-checked:text-white peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-green-500 peer-checked:ring-opacity-50 peer-checked:ring-offset-2 w-6 h-6 rounded-full border-2 border-gray-600 flex items-center justify-center transition duration-200">
            </span>
                        <span class="ml-2 text-sm text-gray-700">Actief</span>
                    </label>

                    <!-- Not Active Radio Button -->
                    <label for="not_active" class="flex items-center cursor-pointer">
                        <input type="radio" id="not_active" name="status" value="not_active" class="hidden peer" {{ $vacancy->status == 'not_active' ? 'checked' : '' }}>
                        <span class="peer-checked:bg-red-500 peer-checked:text-white peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-red-500 peer-checked:ring-opacity-50 peer-checked:ring-offset-2 w-6 h-6 rounded-full border-2 border-gray-600 flex items-center justify-center transition duration-200">
                        </span>
                        <span class="ml-2 text-sm text-gray-700">Niet Actief</span>
                    </label>
                </div>
                @error('status')
                <div role="alert">
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-6">
                <button type="submit"
                        class="px-4 py-2 bg-violet text-white rounded-md hover:bg-violetDark focus:outline-none focus:ring-2 focus:ring-violetDark focus:ring-opacity-50">
                    Update Vacature
                </button>
            </div>
        </form>
    </div>
</x-nav>
