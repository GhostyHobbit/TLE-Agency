<x-nav>
    <body class="bg-cream text-black">

    <div class="max-w-4xl mx-auto p-8 bg-white shadow-xl rounded-xl mt-10 mb-16">

        <h1 class="text-2xl font-semibold text-black mb-6 text-center">Mijn Wachtrij</h1>

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

        <h2 class="text-xl font-semibold mb-4">Ingeschreven voor de volgende vacatures:</h2>

        @if($vacancies->isEmpty())
            <p class="text-black">Je hebt je nog niet ingeschreven voor een vacature.</p>
        @else
            <div class="overflow-x-auto"> <!-- Zorgt ervoor dat de tabel scrollbaar wordt als het nodig is -->
                <table class="min-w-full table-fixed">
                    <thead>
                    <tr class="bg-mossLight text-black">
                        <th class="px-4 py-3 text-left w-4/12">Vacature</th>
                        <th class="px-4 py-3 text-left w-3/12">Status</th>
                        <th class="px-4 py-3 text-left w-2/12">Positie in de wachtrij</th>
                        <th class="px-4 py-3 text-left w-3/12">Bericht</th>
                    </tr>
                    </thead>
                    <tbody class="text-black">
                    @foreach($vacancies as $vacancy)
                        <tr class="border-t border-strokeThin hover:bg-mossLight">
                            <td class="px-4 py-3">{{ $vacancy->vacancy->name }}</td>
                            <td class="px-4 py-3">
                                @if($vacancy->status === 1)
                                    Ingeschreven en in wachtrij
                                @elseif($vacancy->status === 2)
                                    Er is een bericht gestuurd!
                                @else
                                    Onbekend
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                {{ $vacancy->queuePosition ?? 'Onbekend' }} <!-- Hier wordt de berekende wachtrijpositie getoond -->
                            </td>
                            <td class="px-4 py-3">
                                @if($vacancy->message_id)
                                    <a href="{{ route('employee.message.view', $vacancy->message_id) }}" class="text-blue-500 hover:underline">Bekijk Bericht</a>
                                @else
                                    Geen bericht
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>

    </body>
</x-nav>
