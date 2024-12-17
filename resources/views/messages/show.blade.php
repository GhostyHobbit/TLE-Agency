<x-nav>
    <body class="bg-cream text-black">
    <div class="max-w-4xl mx-auto p-8 bg-white shadow-xl rounded-xl mt-10 mb-16">
        <h1 class="text-2xl font-semibold text-black mb-6 text-center">Bericht</h1>

        <!-- Bericht vak met border -->
        <div class="bg-white p-6 shadow-lg rounded-xl mb-6 border-2 border-gray-300">
            <p class="text-lg">{{ $message->message }}</p>
        </div>

        <!-- Locatie, datum en tijd vak -->
        <div class="bg-mossLight p-6 shadow-lg space-y-4 rounded-xl mb-6">
            <p class="text-lg"><strong>Locatie:</strong> {{ $message->location }}</p>
            <p class="text-lg"><strong>Datum:</strong> {{ $message->date }}</p>
            <p class="text-lg"><strong>Tijd:</strong> {{ $message->time }}</p>
        </div>

        <!-- Actieknoppen -->
        <div class="flex flex-col items-center space-y-4 mb-8">
            <button onclick="openModal('acceptModal')"
                    class="w-full bg-mossLight hover:bg-mossMedium text-black font-semibold py-2 px-6 rounded-md shadow-md">
                Accepteren
            </button>
            <button onclick="openModal('rejectModal')"
                    class="w-full bg-red-200 hover:bg-red-300 text-black font-semibold py-2 px-6 rounded-md shadow-md">
                Weigeren
            </button>
            <button onclick="openModal('proposeModal')"
                    class="w-full bg-yellow-200 hover:bg-yellow-300 text-black font-semibold py-2 px-6 rounded-md shadow-md">
                Nieuw Voorstel
            </button>
        </div>

        <!-- Dynamische Modal -->
        <div id="modalOverlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <form method="POST" action="{{ route('update-status') }}" id="modalForm" class="w-11/12 max-w-lg bg-mossLight p-6 rounded-lg shadow-lg relative">
                @csrf
                <h2 id="modalTitle" class="text-xl font-bold mb-4"></h2>
                <p id="modalMessage" class="text-black mb-6"></p>

                <!-- Verborgen inputvelden -->
                <input type="hidden" name="status" id="statusInput" value="">
                <input type="hidden" name="message_id" value="{{ $message->id }}">

                <!-- Datum en tijd bij nieuw voorstel -->
                <div id="modalFormContent" class="space-y-4"></div>

                <button type="submit" id="modalActionButton" class="w-full bg-violet hover:bg-violetDark text-white font-semibold py-2 rounded-md mb-6">
                    Versturen
                </button>

                <div class="text-center">
                    <a href="javascript:void(0);" onclick="closeModal()"
                       class="text-violet hover:text-violetDark font-bold py-2 px-4 rounded-md focus:outline-none">
                        Terug
                    </a>
                </div>
            </form>
        </div>

        <!-- Terugknop -->
        <div class="mt-8 text-center">
            <a href="{{ url()->previous() }}"
               class="text-violet hover:text-violetDark font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-violetDark focus:ring-opacity-50">
                Terug
            </a>
        </div>

        <!-- Scripts -->
        <script>
            function openModal(action) {
                const modalOverlay = document.getElementById('modalOverlay');
                const modalTitle = document.getElementById('modalTitle');
                const modalMessage = document.getElementById('modalMessage');
                const modalFormContent = document.getElementById('modalFormContent');
                const statusInput = document.getElementById('statusInput');

                modalFormContent.innerHTML = ''; // Reset inhoud

                if (action === 'acceptModal') {
                    modalTitle.textContent = 'Accepteren';
                    modalMessage.textContent = 'Weet je zeker dat je deze afspraak wilt accepteren?';
                    statusInput.value = 3;
                } else if (action === 'rejectModal') {
                    modalTitle.textContent = 'Weigeren';
                    modalMessage.textContent = 'Weet je zeker dat je deze afspraak wilt weigeren?';
                    statusInput.value = 4;
                } else if (action === 'proposeModal') {
                    modalTitle.textContent = 'Nieuw Voorstel';
                    modalMessage.textContent = 'Vul de nieuwe datum en tijd in:';
                    modalFormContent.innerHTML = `
                        <label for='newDate' class='text-black font-semibold'>Datum:</label>
                        <input type='date' name='new_date' id='newDate' class='w-full p-2 border rounded-md' required>
                        <label for='newTime' class='text-black font-semibold'>Tijd:</label>
                        <input type='time' name='new_time' id='newTime' class='w-full p-2 border rounded-md' required>
                    `;
                    statusInput.value = 5;
                }
                modalOverlay.classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('modalOverlay').classList.add('hidden');
            }
        </script>
    </div>
    </body>
</x-nav>
