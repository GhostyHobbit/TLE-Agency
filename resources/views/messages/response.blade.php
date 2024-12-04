<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bekijk Bericht</title>

</head>
<body>
<h1>Bericht</h1>

<!-- Toon de details van het bericht -->
<p><strong>Bericht:</strong> {{ $message->message }}</p>
<p><strong>Locatie:</strong> {{ $message->location }}</p>
<p><strong>Datum:</strong> {{ $message->date }}</p>
<p><strong>Tijd:</strong> {{ $message->time }}</p>

<!-- Terugknop -->
<a href="{{ url()->previous() }}">Terug</a>
</body>
</html>
