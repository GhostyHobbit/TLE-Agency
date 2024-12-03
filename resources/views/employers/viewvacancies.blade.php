<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacature Overzicht</title>
</head>
<body>
<h1>Vacature Overzicht</h1>

<!-- Controleer of er vacatures zijn -->
@if($vacancies->isEmpty())
    <p>Er zijn momenteel geen vacatures beschikbaar.</p>
@else
    <table border="1" cellpadding="10">
        <thead>
        <tr>
            <th>#</th>
            <th>Functie</th>
            <th>Werkuren</th>
            <th>Salaris</th>
            <th>Werkgever</th>
            <th>edit</th>
            <th>uitnodigen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vacancies as $vacancy)
            <tr>
                <td>{{ $vacancy->id }}</td>
                <td>{{ $vacancy->name }}</td>
                <td>{{ $vacancy->hours }} uur</td>
                <td>€{{ number_format($vacancy->salary, 2) }}</td>
                <td>onbekend</td>
                <td> nog leeg </td>
                <td>
                    <a href="{{ route('messages.create', ['vacancyId' => $vacancy->id]) }}" class="btn btn-warning btn-sm">Werkzoekende uitnodigen</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif

<!-- Voeg een knop toe om een nieuwe vacature aan te maken -->
<a href="{{ route('vacancies.create') }}">Nieuwe vacature toevoegen</a>
</body>
</html>

