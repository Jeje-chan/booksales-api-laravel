<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genress</title>
</head>
<body>
    <h1>Macam-macam Genre buku</h1>

    @foreach ($genres as $genre)
        <ul>
            <li>{{ $genre['name'] }}</li>
            <li>{{ $genre['description'] }}</li>
        </ul>
    @endforeach
</body>
</html>