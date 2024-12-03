<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stuur een Bericht</title>
</head>
<body>
<h1>Stuur een Bericht</h1>

<!-- Succesbericht -->
@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
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

<form action="{{ route('messages.store', $vacancy->id) }}" method="POST">
    @csrf
    <label for="message">Bericht:</label>
    <textarea name="message" required></textarea><br>

    <label for="date">Datum:</label>
    <input type="date" name="date" required><br>

    <label for="time">Tijd:</label>
    <input type="time" name="time" required><br>

    <label for="location">Locatie:</label>
    <input type="text" name="location"><br>

    <button type="submit">Bericht versturen</button>
</form>



</body>
</html>
