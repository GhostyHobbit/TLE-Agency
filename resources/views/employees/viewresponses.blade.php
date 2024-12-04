<!-- resources/views/employee/queue.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Wachtrij</title>
</head>
<body>
<h1>Mijn Wachtrij</h1>

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

<h2>Ingeschreven voor de volgende vacatures:</h2>

@if($vacancies->isEmpty())
    <p>Je hebt je nog niet ingeschreven voor een vacature.</p>
@else
    <table border="1" cellpadding="10">
        <thead>
        <tr>
            <th>Vacature</th>
            <th>Status</th>
            <th>Positie in de wachtrij</th>
            <th>Bericht</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vacancies as $vacancy)
            <tr>
                <td>{{ $vacancy->name }}</td>
                <td>
                    @if($vacancy->pivot->status == 1)
                        Ingeschreven en in wachtrij
                    @elseif($vacancy->pivot->status == 2)
                        er is een bericht gestuurd!
                    @else
                        Onbekend
                    @endif
                </td>
                <td>{{ $vacancy->queue_position ?? 'Onbekend' }}</td>
                <td>
                    @if($vacancy->pivot->message_id)
                        <a href="{{ route('messages.response', $vacancy->pivot->message_id) }}">Bekijk Bericht</a>
                    @else
                        Geen bericht
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif





</body>
</html>
