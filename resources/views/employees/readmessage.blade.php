<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bericht bekijken</title>
</head>
<body>
<h1>Bericht van werkgever</h1>




    <form action="" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>
                <input type="radio" name="response" value="accept" required>
                Accepteren
            </label>
            <label>
                <input type="radio" name="response" value="reject">
                Weigeren
            </label>
            <label>
                <input type="radio" name="response" value="propose">
                Nieuw voorstel
            </label>
        </div>

        <div id="new-proposal-field" style="display: none;">
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
        </div>

        <button type="submit">Verstuur reactie</button>
    </form>


<script>
    const responseInputs = document.querySelectorAll('input[name="response"]');
    const proposalField = document.getElementById('new-proposal-field');

    responseInputs.forEach(input => {
        input.addEventListener('change', () => {
            if (input.value === 'propose') {
                proposalField.style.display = 'block';
            } else {
                proposalField.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>
