<x-nav>
    <body class="bg-cream text-black">

    <div class="max-w-4xl mx-auto p-8 bg-white shadow-xl rounded-xl mt-10 mb-16">

        <h1 class="text-2xl font-semibold text-black mb-6 text-center">Bericht</h1>

        <!-- Bericht vak met border -->
        <div class="bg-white p-6 shadow-lg rounded-xl mb-6 border-2 border-gray-300">
            <p class="text-lg"><strong></strong> {{ $message->message }}</p>
        </div>

        <!-- Locatie, datum en tijd vak -->
        <div class="bg-mossLight p-6 shadow-lg rounded-xl">
            <p class="text-lg"><strong>Locatie:</strong> {{ $message->location }}</p>
            <p class="text-lg"><strong>Datum:</strong> {{ $message->date }}</p>
            <p class="text-lg"><strong>Tijd:</strong> {{ $message->time }}</p>
        </div>

        <!-- Terugknop -->
        <div class="mt-6 text-center">
            <a href="{{ url()->previous() }}" class="bg-violet hover:bg-violetDark text-white font-bold py-3 px-6 rounded-md focus:outline-none focus:ring-2 focus:ring-violetDark focus:ring-opacity-50">
                Terug
            </a>
        </div>

    </div>

    </body>
</x-nav>
