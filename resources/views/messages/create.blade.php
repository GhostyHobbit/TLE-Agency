<x-nav>
    <script type="text/javascript">
        // Functie voor de pop-up bevestiging
        function confirmSubmission(numberOfInvites) {
            var confirmation = confirm("Let op: je staat op het punt een bericht te sturen naar " + numberOfInvites + " mensen.");

            // Als de gebruiker bevestigt, wordt het formulier verzonden
            if (confirmation) {
                document.getElementById('messageForm').submit();  // Verzendt het formulier
            }
        }
    </script>

    <body class="bg-cream text-black">

    <div class="max-w-4xl mx-auto p-8 bg-mossLight shadow-xl rounded-xl mt-10 mb-16">

        <h1 class="text-2xl font-semibold text-black mb-6 text-center">Stuur een Bericht</h1>



        <h2 class="text-lg font-semibold text-black mb-6">Bericht versturen naar werkzoekenden voor Vacature: {{ $vacancy->name }}</h2>

        <!-- Formulier -->
        <form id="messageForm" action="{{ route('messages.store', $vacancy->id) }}" method="POST">
            @csrf

            <!-- Aantal personen -->
            <div class="mb-6">
                <label for="number_of_invites" class="block text-sm font-medium text-black">Hoeveel personen wilt u uitnodigen?</label>
                <input type="number" name="number_of_invites" id="number_of_invites" min="1" class="mt-2 block w-full bg-white border-mossMedium rounded-md shadow-sm px-4 py-3 focus:ring-mossMedium focus:border-mossMedium" required>
            </div>

            <!-- Bericht -->
            <div class="mb-6">
                <label for="message" class="block text-sm font-medium text-black">Schrijf uw bericht:</label>
                <textarea name="message" id="message" rows="5" class="mt-2 block w-full bg-white border-mossMedium rounded-md shadow-sm px-4 py-3 focus:ring-mossMedium focus:border-mossMedium" required></textarea>
            </div>

            <!-- Locatie -->
            <div class="mb-6">
                <label for="location" class="block text-sm font-medium text-black">Op welke locatie wilt u afspreken?</label>
                <input type="text" name="location" id="location" class="mt-2 block w-full bg-white border-mossMedium rounded-md shadow-sm px-4 py-3 focus:ring-mossMedium focus:border-mossMedium" required>
            </div>

            <!-- Datum en tijd -->
            <div class="mb-6 grid grid-cols-2 gap-6">
                <div>
                    <label for="date" class="block text-sm font-medium text-black">Datum:</label>
                    <input type="date" name="date" id="date" class="mt-2 block w-full bg-white border-mossMedium rounded-md shadow-sm px-4 py-3 focus:ring-mossMedium focus:border-mossMedium" required>
                </div>
                <div>
                    <label for="time" class="block text-sm font-medium text-black">Tijd:</label>
                    <input type="time" name="time" id="time" class="mt-2 block w-full bg-white border-mossMedium rounded-md shadow-sm px-4 py-3 focus:ring-mossMedium focus:border-mossMedium" required>
                </div>
            </div>

            <!-- Verzenden knop -->
            <div class="mt-8">
                <button type="button" onclick="confirmSubmission(document.getElementById('number_of_invites').value)" class="w-full bg-violet hover:bg-violetDark text-white font-bold py-3 px-6 rounded-md focus:outline-none focus:ring-2 focus:ring-violetDark focus:ring-opacity-50">
                    Verstuur berichten
                </button>
            </div>
        </form>
    </div>

    <div id="myEnroll" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 hidden xl:justify-center">
        <!-- Modal Content -->
        <div class="w-[96vw] min-h-[45vh] m-2 bg-mossLight rounded-lg xl:w-[30vw]">
            <div class="modal-header p-4 flex justify-between items-center">
                <p class="text-navLink text-mossDark font-bold">Melding</p>
                <button id="closeEnroll" class="text-black hover:text-gray-700" aria-label="Close">
                    &times;
                </button>
            </div>
            <div class="modal-body bg-mossLight p-4">
                <!-- Success or Error Messages -->
                @if (session('success'))
                    <p class="text-mossDark text-center font-bold text-lg">{{ session('success') }}</p>
                @endif

                @if (session('error'))
                    <p class="text-mossDark text-center font-bold text-lg">{{ session('error') }}</p>
                @endif
            </div>
            <div id="closeEnrollFooter" class="modal-footer py-2 flex justify-center bg-violet rounded-2xl border-b-4 border-violetDark border-2 mx-4 my-2 hover:bg-[#7c1a51] active:bg-[#aa0160]">
                <button class="text-cream text-base font-bold font-['Radikal'] leading-snug">Sluit</button>
            </div>
        </div>
    </div>

    <script>
        const enroll = document.getElementById('myEnroll');
        const closeEnrollButtons = document.querySelectorAll('#closeEnroll, #closeEnrollFooter');

        // Automatically open modal if there's a success or error message
        if ("{{ session('success') }}" || "{{ session('error') }}") {
            enroll.classList.remove('hidden');
        }

        // Close modal logic
        closeEnrollButtons.forEach(button => {
            button.addEventListener('click', () => {
                enroll.classList.add('hidden');
            });
        });

        // Close modal when clicking outside of it
        enroll.addEventListener('click', (event) => {
            if (event.target === enroll) {
                enroll.classList.add('hidden');
            }
        });
    </script>
    </body>
</x-nav>
