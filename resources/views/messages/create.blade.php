<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stuur een Bericht</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
</head>

<body class="bg-gray-50">

<div class="max-w-4xl mx-auto p-8 bg-white shadow-xl rounded-xl mt-10">

    <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Stuur een Bericht</h1>

    <!-- Succes- en foutberichten -->
    @if (session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p class="text-red-500">{{ session('error') }}</p>
    @endif

    @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2 class="text-lg font-semibold text-gray-700 mb-6">Bericht versturen naar werkzoekenden voor Vacature: {{ $vacancy->name }}</h2>

    <!-- Formulier -->
    <form id="messageForm" action="{{ route('messages.store', $vacancy->id) }}" method="POST">
        @csrf

        <!-- Aantal personen -->
        <div class="mb-6">
            <label for="number_of_invites" class="block text-sm font-medium text-gray-700">Hoeveel personen wilt u uitnodigen?</label>
            <input type="number" name="number_of_invites" id="number_of_invites" min="1" class="mt-2 block w-full bg-green-50 border-green-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required>
        </div>

        <!-- Bericht -->
        <div class="mb-6">
            <label for="message" class="block text-sm font-medium text-gray-700">Schrijf uw bericht:</label>
            <textarea name="message" id="message" rows="5" class="mt-2 block w-full bg-green-50 border-green-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required></textarea>
        </div>

        <!-- Locatie -->
        <div class="mb-6">
            <label for="location" class="block text-sm font-medium text-gray-700">Op welke locatie wilt u afspreken?</label>
            <input type="text" name="location" id="location" class="mt-2 block w-full bg-green-50 border-green-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required>
        </div>

        <!-- Datum en tijd -->
        <div class="mb-6 grid grid-cols-2 gap-6">
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Datum:</label>
                <input type="date" name="date" id="date" class="mt-2 block w-full bg-green-50 border-green-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required>
            </div>
            <div>
                <label for="time" class="block text-sm font-medium text-gray-700">Tijd:</label>
                <input type="time" name="time" id="time" class="mt-2 block w-full bg-green-50 border-green-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required>
            </div>
        </div>

        <!-- Verzenden knop -->
        <div class="mt-8">
            <button type="button" onclick="confirmSubmission(document.getElementById('number_of_invites').value)" class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-6 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50">
                Verstuur berichten
            </button>
        </div>
    </form>
</div>

</body>
</html>
