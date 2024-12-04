<x-nav>
    <!-- Skip to Content Link -->
    <a href="#main-content" class="sr-only focus:not-sr-only">Skip to content</a>

    <div id="main-content" class="max-w-2xl mx-auto p-6 sm:p-8 bg-cream shadow-md rounded-lg border border-black mt-8 sm:mt-12 mb-8 sm:mb-12">
        <h1 class="text-2xl font-bold mb-4 text-mossFoot">Maak een vacature</h1>

        <form action="{{ route('vacancies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Hidden Employer ID -->
            <input type="hidden" name="employer_id" value="1">

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">
                    Vacature titel <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" id="name" aria-required="true"
                       class="mt-1 block w-full rounded-md border border-black shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
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
                <input type="number" name="hours" id="hours" aria-required="true"
                       class="mt-1 block w-full rounded-md border border-black shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
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
                <input type="number" name="salary" id="salary" step="0.01" aria-required="true"
                       class="mt-1 block w-full rounded-md border border-black shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
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
                <input type="text" name="location" id="location" aria-required="true"
                       class="mt-1 block w-full rounded-md border border-black shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
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
                          class="mt-1 block w-full rounded-md border border-black shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                          placeholder="Voer de baan omschrijving in" required></textarea>
                @error('description')
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
                       class="mt-1 block w-full text-sm text-gray-700 rounded-md border border-black shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       accept="image/*">
                <p id="picture-description" class="text-sm text-gray-500">Upload een JPG, PNG of GIF bestand.</p>
                @error('picture')
                <div role="alert">
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <div class="flex justify-end">
                <button class="w-72 h-20 relative bg-pink-700 rounded-2xl border-b-2 border-pink-900 flex items-center justify-between hover:bg-pink-800 active:bg-pink-600">
                    <!-- Custom PNG Icon -->
                    <img src="{{ asset('images/right-arrow-buttons.png') }}" alt="Right Arrow" class="w-6 h-6 left-[254px] top-[28px] absolute" />

                    <!-- Button Text -->
                    <span class="Verzenden left-[20px] top-[26px] absolute text-white text-xl font-bold font-['Radikal'] leading-relaxed">
    Verzenden
  </span>
                </button>





            </div>
        </form>
    </div>
</x-nav>
