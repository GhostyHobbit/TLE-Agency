<x-nav>
    <body class="bg-cream text-black">
    <div class="max-w-6xl mx-auto p-8 bg-white shadow-xl rounded-xl mt-12 mb-16">

        <!-- Tab Navigatie -->
        <div class="mb-20 tab-container">
            <button onclick="openTab(event, 'messages')" class="tab-button active-tab">Vacatures met berichten</button>
            <button onclick="openTab(event, 'queue')" class="tab-button">Ingeschreven vacatures</button>
            <button onclick="openTab(event, 'statusUpdates')" class="tab-button">Status Updates</button>
        </div>

        <!-- Pagina Titel -->
        <h1 class="text-3xl font-bold text-black mb-8 mt-8 text-center">Mijn Wachtrij</h1>

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

        <!-- Tab 1: Vacatures met berichten -->
        <div id="messages" class="tab-content">
            <h2 class="text-2xl font-semibold mb-6">Vacatures met een bericht</h2>
            @php
                $vacanciesWithMessage = $vacancies->filter(fn($v) => $v->status === 2);
            @endphp

            @if($vacanciesWithMessage->isEmpty())
                <p class="text-black mb-6">Geen vacatures met berichten.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @foreach($vacanciesWithMessage as $vacancy)
                        <div class="bg-mossLight shadow-md rounded-lg p-6">
                            <a href="{{ route('vacancies.show', $vacancy->vacancy->id) }}" class="text-xl font-bold mb-2">{{ $vacancy->vacancy->name }}</a>
                            <p class="text-black mb-4">Er is een bericht gestuurd op {{ $vacancy->message->created_at->format('d-m-Y H:i') }}</p>
                            <a href="{{ route('employee.message.view', $vacancy->message_id) }}"
                               class="text-blue-700 hover:underline font-semibold">Bekijk Bericht</a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Tab 2: Ingeschreven vacatures -->
        <div id="queue" class="tab-content hidden">
            <h2 class="text-2xl font-semibold mb-6">Ingeschreven vacatures</h2>
            @php
                $vacanciesInQueue = $vacancies->filter(fn($v) => $v->status === 1);
            @endphp

            @if($vacanciesInQueue->isEmpty())
                <p class="text-black mb-6">Geen vacatures waarin je bent ingeschreven.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($vacanciesInQueue as $vacancy)
                        <div class="bg-mossLight shadow-md rounded-lg p-6">
                            <a href="{{ route('vacancies.show', $vacancy->vacancy->id) }}" class="text-xl font-bold mb-2">{{ $vacancy->vacancy->name }}</a>
                            <p class="text-black mb-4">ingeschreven op {{ $vacancy->created_at->format('d-m-Y H:i') }}</p>
                            <p class="text-black mb-4">Wachtrijpositie: <span class="font-semibold">{{ $vacancy->queuePosition ?? 'Onbekend' }}</span></p>

                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Tab 3: Status Updates -->
        <div id="statusUpdates" class="tab-content hidden">
            <h2 class="text-2xl font-semibold mb-6">Status Updates</h2>

            <!-- Acceptaties -->
            <div class="mb-6">
                <h3 class="text-xl font-bold text-mossLight-500">Geaccepteerd</h3>
                @php
                    $acceptedMessages = $vacancies->filter(fn($v) => $v->status === 3);
                @endphp

                @if($acceptedMessages->isEmpty())
                    <p class="text-black mb-4">Geen geaccepteerde berichten.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($acceptedMessages as $message)
                            <div class="bg-mossLight shadow-md rounded-lg p-6">
                                <a href="{{ route('vacancies.show', $vacancy->vacancy->id) }}" class="text-xl font-bold mb-2">{{ $message->vacancy->name }}</a>
                                <p class="text-black mb-4">Geaccepteerd op: {{ $message->updated_at->format('d-m-Y H:i') }}</p>
                                <div class="bg-white p-6 shadow-lg space-y-4 rounded-xl mb-6">
                                    <p class="text-lg"><strong>Locatie:</strong> {{ $message->message->location }}</p>
                                    <p class="text-lg"><strong>Datum:</strong> {{ $message->message->date }}</p>
                                    <p class="text-lg"><strong>Tijd:</strong> {{ $message->message->time }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>


            <!-- Weigeringen -->
            <div class="mb-6">
                <h3 class="text-xl font-bold text-red-500">Weigeringen</h3>
                @php
                    $rejectedMessages = $vacancies->filter(fn($v) => $v->status === 4);
                @endphp

                @if($rejectedMessages->isEmpty())
                    <p class="text-black mb-4">Geen geweigerde berichten.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($rejectedMessages as $message)
                            <div class="bg-red-100 shadow-md rounded-lg p-6">
                                <a href="{{  route('vacancies.show', $vacancy->vacancy->id) }}" class="text-xl font-bold mb-2">{{ $message->vacancy->name }}</a>
                                <p class="text-black mb-4">Geweigerd op: {{ $message->updated_at->format('d-m-Y H:i') }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Voorstellen -->
            <div>
                <h3 class="text-xl font-bold text-yellow-500">Nieuw Voorstel</h3>
                @php
                    $proposedMessages = $vacancies->filter(fn($v) => $v->status === 5);
                @endphp

                @if($proposedMessages->isEmpty())
                    <p class="text-black mb-4">Geen nieuwe voorstellen.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($proposedMessages as $message)
                            <div class="bg-yellow-100 shadow-md rounded-lg p-6">
                                <a href="{{  route('vacancies.show', $vacancy->vacancy->id)  }}" class="text-xl font-bold mb-2">{{ $message->vacancy->name }}</a>
                                <p class="text-black mb-4">Nieuw voorstel gedaan op: {{ $message->updated_at->format('d-m-Y H:i') }}</p>
                                <div class="bg-white p-6 shadow-lg space-y-4 rounded-xl mb-6">
                                    <p class="text-black mb-4">Nieuw voorstel:</p>
                                    <p class="text-lg"><strong>Locatie:</strong> {{ $message->message->location }}</p>
                                    <p class="text-lg"><strong>Datum:</strong> {{ $message->response->date }}</p>
                                    <p class="text-lg"><strong>Tijd:</strong> {{ $message->response->time }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Voorstellen en Weigeringen kunnen ook hier worden toegevoegd -->
        </div>
    </div>

    <script>
        // Tab functionaliteit
        function openTab(evt, tabName) {
            // Verberg alle tab-content elementen
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => content.classList.add('hidden'));

            // Verwijder active-tab van alle knoppen
            const tabButtons = document.querySelectorAll('.tab-button');
            tabButtons.forEach(button => button.classList.remove('active-tab'));

            // Toon de geselecteerde tab en voeg active-tab toe
            document.getElementById(tabName).classList.remove('hidden');
            evt.currentTarget.classList.add('active-tab');
        }

        // Voeg standaard actieve tab styling toe
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelector('.tab-button').classList.add('active-tab');
        });
    </script>

    <style>
        /* Tab-knoppen styling */
        .tab-button {
            width: 100%; /* Zorg dat alle knoppen even breed zijn */
            padding: 10px 20px;
            background-color: #FFFFFF; /* Standaard kleur wit */
            color: #7C1A51; /* Tekstkleur violetDark */
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            border: #7C1A51;
            border-radius: 8px;
            transition: all 0.3s ease;
        }


        .active-tab {
            background-color: #7C1A51; /* Active kleur violetDark */
            color: #FFFFFF; /* Tekstkleur wit */
        }

        /* Flexbox container voor verticale weergave */
        .tab-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px; /* Ruimte tussen knoppen */
            max-width: 300px; /* Beperk breedte van container */
            margin: 0 auto; /* Centreer container */
        }
    </style>

    </body>
</x-nav>
