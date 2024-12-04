<x-nav>
    <body class="bg-cream text-black">

    <div class="max-w-4xl mx-auto p-8 bg-white shadow-xl rounded-xl mt-10 mb-16">

        <h1 class="text-2xl font-semibold text-black mb-6 text-center">Vacature Overzicht</h1>

        <!-- Controleer of er vacatures zijn -->
        @if($vacancies->isEmpty())
            <p class="text-black">Er zijn momenteel geen vacatures beschikbaar.</p>
        @else
            <div class="overflow-x-auto"> <!-- Zorgt ervoor dat de tabel scrollbaar wordt als het nodig is -->
                <table class="min-w-full table-fixed">
                    <thead>
                    <tr class="bg-mossLight text-black">
                        <th class="px-3 py-3 text-left w-1/12">#</th>
                        <th class="px-3 py-3 text-left w-2/12">Functie</th>
                        <th class="px-3 py-3 text-left w-2/12">Werkuren</th>
                        <th class="px-3 py-3 text-left w-2/12">Salaris</th>
                        <th class="px-3 py-3 text-left w-2/12">Aantal in Wachtrij</th>
                        <th class="px-3 py-3 text-left w-2/12">Werkgever</th>
                        <th class="px-3 py-3 text-left w-1/12">Bewerken</th>
                        <th class="px-3 py-3 text-left w-1/12">Uitnodigen</th>
                    </tr>
                    </thead>
                    <tbody class="text-black">
                    @foreach($vacancies as $vacancy)
                        <tr class="border-t border-strokeThin hover:bg-mossLight">
                            <td class="px-3 py-3">{{ $vacancy->id }}</td>
                            <td class="px-3 py-3">{{ $vacancy->name }}</td>
                            <td class="px-3 py-3">{{ $vacancy->hours }} uur</td>
                            <td class="px-3 py-3">€{{ number_format($vacancy->salary, 2) }}</td>
                            <td class="px-3 py-3">{{ $vacancy->employees_count }} werkzoekenden</td>
                            <td class="px-3 py-3">{{ $vacancy->employer ? $vacancy->employer->name : 'Onbekend' }}</td>
                            <td class="px-3 py-3">
                                <a href="{{ route('vacancies.edit', ['vacancyId' => $vacancy->id]) }}" class="text-violet hover:text-violetDark font-bold">vacature aanpassen</a>
                            </td>
                            <td class="px-3 py-3">
                                <a href="{{ route('messages.create', ['vacancyId' => $vacancy->id]) }}" class="text-violet hover:text-violetDark font-bold">Werkzoekende uitnodigen</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Voeg een knop toe om een nieuwe vacature aan te maken -->
        <div class="mt-6 text-center">
            <a href="{{ route('vacancies.create') }}" class="bg-violet hover:bg-violetDark text-white font-bold py-3 px-6 rounded-md focus:outline-none focus:ring-2 focus:ring-violetDark focus:ring-opacity-50">
                Nieuwe vacature toevoegen
            </a>
        </div>
    </div>

    </body>
</x-nav>
