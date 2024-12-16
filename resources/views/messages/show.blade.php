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

        <div class="flex flex-col items-center space-y-4 mb-8">
            <button onclick="showModal('acceptModal')"
                    class="w-full bg-mossLight hover:bg-mossMedium text-black font-semibold py-2 px-6 rounded-md shadow-md">
                Accepteren
            </button>
            <button onclick="showModal('rejectModal')"
                    class="w-full bg-red-200 hover:bg-red-300 text-black font-semibold py-2 px-6 rounded-md shadow-md">
                Weigeren
            </button>
            <button onclick="showModal('proposeModal')"
                    class="w-full bg-yellow-200 hover:bg-yellow-300 text-black font-semibold py-2 px-6 rounded-md shadow-md">
                Nieuw Voorstel
            </button>
        </div>

        <!-- Pop-up Modals -->
        <!-- Accepteren Modal -->
        <div id="acceptModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <div class="w-11/12 max-w-lg bg-mossLight p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-4">Accepteren</h2>
                <p class="text-black mb-6">Weet je zeker dat je deze afspraak wilt accepteren?</p>
                <button onclick="sendResponse('accept')"
                        class="w-full bg-violet hover:bg-violetDark text-white font-semibold py-2 rounded-md mb-6">
                    Versturen
                </button>
                <div class="text-center">
                    <a href="javascript:void(0);" onclick="closeModal('acceptModal')"
                       class="text-violet hover:text-violetDark font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-violetDark focus:ring-opacity-50">
                        Terug
                    </a>
                </div>
            </div>
        </div>

        <!-- Weigeren Modal -->
        <div id="rejectModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <div class="w-11/12 max-w-lg bg-mossLight p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-4">Weigeren</h2>
                <p class="text-black mb-6">Weet je zeker dat je deze afspraak wilt weigeren?</p>
                <button onclick="sendResponse('reject')"
                        class="w-full bg-violet hover:bg-violetDark text-white font-semibold py-2 rounded-md mb-6">
                    Versturen
                </button>
                <div class="text-center">
                    <a href="javascript:void(0);" onclick="closeModal('rejectModal')"
                       class="text-violet hover:text-violetDark font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-violetDark focus:ring-opacity-50">
                        Terug
                    </a>
                </div>
            </div>
        </div>

        <!-- Nieuw Voorstel Modal -->
        <div id="proposeModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <div class="w-11/12 max-w-lg bg-mossLight p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-4">Nieuw Voorstel</h2>
                <p class="text-black mb-4">Vul hier de nieuwe datum en tijd in voor je voorstel.</p>

                <!-- Formulier voor nieuw voorstel -->
                <form id="proposalForm" class="space-y-6 mb-6">
                    <div>
                        <label for="newDate" class="text-black font-semibold">Datum:</label>
                        <input type="date" id="newDate"
                               class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-mossDark">
                    </div>
                    <div>
                        <label for="newTime" class="text-black font-semibold">Tijd:</label>
                        <input type="time" id="newTime"
                               class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-mossDark">
                    </div>
                </form>

                <button onclick="sendResponse('propose')"
                        class="w-full bg-violet hover:bg-violetDark text-white font-semibold py-2 rounded-md mb-6">
                    Versturen
                </button>
                <div class="text-center">
                    <a href="javascript:void(0);" onclick="closeModal('proposeModal')"
                       class="text-violet hover:text-violetDark font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-violetDark focus:ring-opacity-50">
                        Terug
                    </a>
                </div>
            </div>
        </div>

        <!-- Terugknop -->
        <div class="mt-8 text-center">
            <a href="{{ url()->previous() }}"
               class="text-violet hover:text-violetDark font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-violetDark focus:ring-opacity-50">
                Terug
            </a>
        </div>

        <!-- Scripts voor modals -->
        <script>
            function showModal(modalId) {
                document.getElementById(modalId).classList.remove('hidden');
            }

            function closeModal(modalId) {
                document.getElementById(modalId).classList.add('hidden');
            }

            function sendResponse(action) {
                // Stuur naar de server zonder extra bevestiging
                fetch('/update-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: getStatus(action), // Haalt de status op
                        message_id: '{{ $message->id }}',
                        new_date: document.getElementById('newDate')?.value,
                        new_time: document.getElementById('newTime')?.value
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Status succesvol bijgewerkt!');
                            location.reload();
                        } else {
                            alert('Er ging iets mis. Probeer het opnieuw!');
                        }
                    })
                    .catch(error => {
                        console.error('Fout bij het versturen:', error);
                        alert('Er is een fout opgetreden!');
                    });
            }

            // Hulpfunctie om de juiste status te bepalen
            function getStatus(action) {
                switch (action) {
                    case 'accept': return 3;
                    case 'reject': return 4;
                    case 'propose': return 5;
                    default: return null;
                }
            }
        </script>
    </div>
    </body>
</x-nav>
