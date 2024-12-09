<x-nav>
    <body class="bg-cream text-black">

    <div class="max-w-4xl mx-auto p-8 bg-white shadow-xl rounded-xl mt-10 mb-16">

        <h1 class="text-2xl font-semibold text-black mb-6 text-center">Bericht</h1>

        <!-- Bericht vak met border -->
        <div class="bg-white p-6 shadow-lg rounded-xl mb-6 border-2 border-gray-300">
            <p class="text-lg"><strong></strong> {{ $message->message }}</p>
        </div>

        <!-- Locatie, datum en tijd vak -->
        <div class="bg-mossLight p-6 shadow-lg space-y-4 rounded-xl mb-6">
            <p class="text-lg"><strong>Locatie:</strong> {{ $message->location }}</p>
            <p class="text-lg"><strong>Datum:</strong> {{ $message->date }}</p>
            <p class="text-lg"><strong>Tijd:</strong> {{ $message->time }}</p>
        </div>

        <form action="{{ route('employee.response', $message->id) }}" method="POST" class="space-y-6">
            @csrf <!-- Laravel's CSRF-token voor beveiliging -->

            <!-- Radio buttons -->
            <div class="flex items-center space-x-6">
                <label class="flex items-center space-x-2">
                    <input
                        type="radio"
                        name="response"
                        value="accept"
                        required
                        class="form-radio h-5 w-5 text-mossDark focus:ring-mossLight"
                    >
                    <span class="text-black">Accepteren</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input
                        type="radio"
                        name="response"
                        value="reject"
                        class="form-radio h-5 w-5 text-mossDark focus:ring-mossLight"
                    >
                    <span class="text-black">Weigeren</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input
                        type="radio"
                        name="response"
                        value="propose"
                        class="form-radio h-5 w-5 text-mossDark focus:ring-mossLight"
                    >
                    <span class="text-black">Nieuw voorstel</span>
                </label>
            </div>

            <!-- Nieuw voorstel veld -->
            <div
                id="new-proposal-field"
                class="bg-mossLight p-6 shadow-lg rounded-xl"
                style="display: none;"
            >
                <div class="flex flex-col mb-4">
                    <label for="date" class="mb-2 font-semibold text-black">Datum:</label>
                    <input
                        type="date"
                        name="date"
                        id="date"
                        value="{{ $message->date }}"
                        class="form-input w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-mossDark focus:border-mossDark"
                        required
                    >
                    @error('date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="time" class="mb-2 font-semibold text-black">Tijd:</label>
                    <input
                        type="time"
                        name="time"
                        id="time"
                        value="{{ $message->time }}"
                        class="form-input w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-mossDark focus:border-mossDark"
                        required
                    >
                    @error('time')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Verstuur reactie knop -->
            <button
                type="submit"
                class="w-full bg-violet hover:bg-violetDark text-white font-bold py-3 px-6 rounded-md shadow-lg focus:outline-none focus:ring-2 focus:ring-violetDark focus:ring-opacity-50"
            >
                Verstuur reactie
            </button>
        </form>


        <!-- Terugknop -->
        <div class="mt-8 text-center">
            <a href="{{ url()->previous() }}"
               class="text-violet hover:text-violetDark font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-violetDark focus:ring-opacity-50"
            >
                Terug
            </a>
        </div>

        <!-- Script voor het tonen/verbergen van nieuw voorstel -->
        <script>
            const responseInputs = document.querySelectorAll('input[name="response"]');
            const proposalField = document.getElementById('new-proposal-field');

            responseInputs.forEach(input => {
                input.addEventListener('change', () => {
                    if (input.value === 'propose') {
                        proposalField.style.display = 'block';
                    } else {
                        proposalField.style.display = 'none';
                    }
                });
            });
        </script>

    </div>

    </body>
</x-nav>
