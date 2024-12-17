<x-nav>
    <body class="bg-cream text-black">

    <div class="max-w-4xl mx-auto p-8 bg-white shadow-xl rounded-xl mt-10 mb-16">

        <ul class="flex mb-6 space-x-4 border-b">
            <li class="mr-2">
                <a href="#vacature-overzicht" class="tab-link active">Vacature Overzicht</a>
            </li>
            <li class="mr-2">
                <a href="#wachten-op-reactie" class="tab-link">Wachten op reactie</a>
            </li>
            <li>
                <a href="#reactie-ontvangen" class="tab-link">Reactie ontvangen</a>
            </li>
        </ul>

        <div id="vacature-overzicht" class="tab-content">
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
                            <th class="px-3 py-3 text-left w-2/12">status</th>
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
                                    <form action="{{ route('vacancies.toggleStatus', $vacancy->id) }}" method="POST" class="inline-block ml-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-violet text-white px-2 py-1 rounded hover:bg-violetDark">
                                            {{ $vacancy->status === 'active' ? 'Deactiveren' : 'Activeren' }}
                                        </button>
                                    </form>
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

        <div id="wachten-op-reactie" class="tab-content hidden">
            <h1 class="text-2xl font-semibold text-black mb-6 text-center">Bericht gestuurd, wachten op reactie.</h1>
            <div class="overflow-x-auto"> <!-- Zorgt ervoor dat de berichtenlijst scrollbaar wordt als het nodig is -->
                <table class="min-w-full table-fixed">
                    <thead>
                    <tr class="bg-mossLight text-black">
                        <th class="px-3 py-3 text-left w-1/12">#</th>
                        <th class="px-3 py-3 text-left w-2/12">Vacature</th>
                        <th class="px-3 py-3 text-left w-2/12">Bericht</th>
                        <th class="px-3 py-3 text-left w-2/12">verstuurd op</th>
                    </tr>
                    </thead>
                    <tbody class="text-black">
                    @foreach($employeeVacancy as $message)
                        @if($message->message && $message->status == 2)
                            <tr class="border-t border-strokeThin hover:bg-mossLight">
                                <td class="px-3 py-3">{{ $message->vacancy->id}}</td>
                                <td class="px-3 py-3">{{ $message->vacancy->name }}</td>
                                <td class="px-3 py-3">
                                    {{ Str::limit(optional($message->message)->message) ?? 'geen bericht verzonden' }}
                                </td>
                                <td class="px-3 py-3">
                                    {{ optional(optional($message->message)->created_at)->format('d-m-Y H:i') ?? 'Geen bericht verzonden' }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div id="reactie-ontvangen" class="tab-content hidden">
            <h1 class="text-2xl font-semibold text-black mb-6 text-center">Bericht gestuurd, reactie ontvangen</h1>
            <div class="overflow-x-auto"> <!-- Zorgt ervoor dat de berichtenlijst scrollbaar wordt als het nodig is -->
                <table class="min-w-full table-fixed">
                    <thead>
                    <tr class="bg-mossLight text-black">
                        <th class="px-3 py-3 text-left w-1/12">#</th>
                        <th class="px-3 py-3 text-left w-2/12">Vacature</th>
                        <th class="px-3 py-3 text-left w-2/12">Bericht</th>
                        <th class="px-3 py-3 text-left w-2/12">verstuurd op</th>
                        <th class="px-3 py-3 text-left w-2/12">Status Inhoud</th>
                        <th class="px-3 py-3 text-left w-2/12">afspraak data</th>
                        <th class="px-3 py-3 text-left w-2/12">nieuwe afspraak data</th>
                    </tr>
                    </thead>
                    <tbody class="text-black">
                    @foreach($employeeVacancy->sortByDesc(function($message) {
                        return $message->message->created_at; // Sort by 'verstuurd op' date
                    }) as $message)
                        @if($message->message && in_array($message->status, [3, 4, 5]))
                            <tr class="border-t border-strokeThin hover:bg-white
                                      @if($message->status == 3) bg-mossLight
                                      @elseif($message->status == 4) bg-red-200
                                      @elseif($message->status == 5) bg-yellow-200
                                      @endif">
                                <td class="px-3 py-3">{{ $message->vacancy->id }}</td>
                                <td class="px-3 py-3">{{ $message->vacancy->name }}</td>
                                <td class="px-3 py-3">
                                    {{ Str::limit(optional($message->message)->message) ?? 'geen bericht verzonden' }}
                                </td>
                                <td class="px-3 py-3">
                                    {{ optional(optional($message->message)->created_at)->format('d-m-Y H:i') ?? 'Geen bericht verzonden' }}
                                </td>
                                <td class="px-3 py-3">
                                    @if($message->status == 3)
                                        bericht geaccepteerd
                                    @elseif($message->status == 4)
                                        bericht geweigerd
                                    @elseif($message->status == 5)
                                        alternatieve datum toegezegd
                                    @endif
                                </td>
                                <td class="px-3 py-3">{{ $message->message->date}}, {{ $message->message->time}}, {{ $message->message->location}}</td>
                                <td class="px-3 py-3">
                                    {{ Str::limit(optional($message->response)->date) ?? 'geen nieuw voorstel gedaan' }}
                                    {{ Str::limit(optional($message->response)->time) ?? '' }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    </body>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabLinks = document.querySelectorAll('.tab-link');
            const tabContents = document.querySelectorAll('.tab-content');

            tabLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();

                    tabLinks.forEach(link => link.classList.remove('active'));
                    tabContents.forEach(content => content.classList.add('hidden'));

                    e.currentTarget.classList.add('active');
                    document.querySelector(e.currentTarget.getAttribute('href')).classList.remove('hidden');
                });
            });
        });
    </script>
</x-nav>
