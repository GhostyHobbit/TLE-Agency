<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>viewvacancies</title>
</head>
<body>

</body>
</html>
@foreach (auth()->user()->vacancies as $vacancy)
    <tr>
        <td>{{ $vacancy->name }}</td>
        <td>
            <a href="{{ route('edit', $vacancy->id) }}" class="btn btn-warning btn-sm">Bewerken</a>
            <form action="{{ route('destroy', $vacancy->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Weet je zeker dat je deze vacature wilt verwijderen?')">Verwijderen</button>
            </form>
        </td>
        <td>
            <a href="{{ route('employers.sendmessage', $vacancy->id) }}" class="btn btn-warning btn-sm">werkzoekende uitnodigen</a>
        </td>
    </tr>
@endforeach
