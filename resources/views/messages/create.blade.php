<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stuur een Bericht</title>
</head>

<script type="text/javascript">
    function confirmSubmission(numberOfInvites) {
        var confirmation = confirm("Let op: je staat op het punt een bericht te sturen naar " + numberOfInvites + " mensen.");

        if (confirmation) {
            document.getElementById('messageForm').submit();  // Verzend het formulier als de gebruiker bevestigt
        }
    }
</script>
<body>
<h1>Stuur een Bericht</h1>

<!-- Succesbericht -->
@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if (session('error'))
    <p style="color: #ff0000;">{{ session('error') }}</p>
@endif

<!-- Fouten tonen -->
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Formulier -->
<!-- resources/views/messages/create.blade.php -->

<!-- resources/views/messages/create.blade.php -->

<h1>Bericht versturen naar werkzoekenden voor Vacature: {{ $vacancy->name }}</h1>

<form id="messageForm" action="{{ route('messages.store', $vacancy->id) }}" method="POST">
    @csrf
    <label for="number_of_invites">Aantal werkzoekenden om uit te nodigen:</label>
    <input type="number" name="number_of_invites" min="1" required><br>

    <label for="message">Bericht:</label>
    <textarea name="message" required></textarea><br>

    <label for="date">Datum:</label>
    <input type="date" name="date" required><br>

    <label for="time">Tijd:</label>
    <input type="time" name="time" required><br>

    <label for="location">Locatie:</label>
    <input type="text" name="location"><br>

    <!-- Knop die de confirmSubmission functie aanroept -->
    <button type="button" onclick="confirmSubmission(document.getElementsByName('number_of_invites')[0].value)">Bericht versturen</button>
</form>




</body>
</html>
