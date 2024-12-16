<x-nav>
    <body class="bg-cream text-black">

    <div class="max-w-6xl mx-auto p-8 bg-white shadow-xl rounded-xl mt-10 mb-16">

        <h1 class="text-3xl font-bold text-black mb-6 text-center">Mijn Wachtrij</h1>

        <!-- Succesbericht -->
        @if (session('success'))
            <p class="text-green-500 mb-4">{{ session('success') }}</p>
        @endif

        <!-- Fouten tonen -->
        @if ($errors->any())
            <div class="text-red-500 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Vacatures met berichten -->
        <h2 class="text-2xl font-semibold mb-4">Vacatures met een bericht</h2>
        @php
            $vacanciesWithMessage = $vacancies->filter(fn($v) => $v->status === 2);
        @endphp

        @if($vacanciesWithMessage->isEmpty())
            <p class="text-black mb-6">Geen vacatures met berichten.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach($vacanciesWithMessage as $vacancy)
                    <div class="bg-mossLight shadow-md rounded-lg p-6">
                        <h3 class="text-xl font-bold mb-2">{{ $vacancy->vacancy->name }}</h3>
                        <p class="text-black mb-4">
                            Er is een bericht gestuurd!
                        </p>
                        <a href="{{ route('employee.message.view', $vacancy->message_id) }}"
                           class="text-blue-700 hover:underline font-semibold">Bekijk Bericht</a>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Vacatures waarin is ingeschreven -->
        <h2 class="text-2xl font-semibold mb-4">Ingeschreven vacatures</h2>
        @php
            $vacanciesInQueue = $vacancies->filter(fn($v) => $v->status === 1);
        @endphp

        @if($vacanciesInQueue->isEmpty())
            <p class="text-black mb-6">Geen vacatures waarin je bent ingeschreven.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($vacanciesInQueue as $vacancy)
                    <div class="bg-mossLight shadow-md rounded-lg p-6">
                        <h3 class="text-xl font-bold mb-2">{{ $vacancy->vacancy->name }}</h3>
                        <p class="text-black mb-4">
                            Ingeschreven en in wachtrij
                        </p>
                        <p class="text-black mb-4">
                            Wachtrijpositie: <span class="font-semibold">{{ $vacancy->queuePosition ?? 'Onbekend' }}</span>
                        </p>
                    </div>
                @endforeach
            </div>
        @endif

    </div>

    </body>
</x-nav>
