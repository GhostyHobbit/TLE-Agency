<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bericht sturen</title>
</head>
<body>
<h1>Bericht sturen naar werkzoekenden</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

    <form action="{{ route('messages.store') }}" method="POST">
    @csrf


    <div>
        <label for="body">Bericht:</label>
        <textarea name="body" id="body" rows="5" required>{{ old('body') }}</textarea>
        @error('body') <p style="color: red;">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="date">Datum:</label>
        <input type="date" name="date" id="date" value="{{ old('date') }}" required>
        @error('date') <p style="color: red;">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="time">Tijd:</label>
        <input type="time" name="time" id="time" value="{{ old('time') }}" required>
        @error('time') <p style="color: red;">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="location">Locatie:</label>
        <input type="text" name="location" id="location" value="{{ old('location') }}" required>
        @error('location') <p style="color: red;">{{ $message }}</p> @enderror
    </div>

    <button type="submit">Verstuur Bericht</button>
</form>
</body>
</html>
