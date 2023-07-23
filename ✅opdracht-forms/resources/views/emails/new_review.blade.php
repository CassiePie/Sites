<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nieuwe review</title>
</head>
<body>
    <h1>Nieuwe review</h1>

    <p>Er is een nieuwe review ontvangen:</p>

    <ul>
        <li>Naam: {{ $data['name'] }}</li>
        <li>Emailadres: {{ $data['email'] }}</li>
        <li>Score: {{ $data['score'] }}</li>
        <li>Review: {{ $data['review'] }}</li>
    </ul>

    <p>Antwoord aan: {{ $data['email'] }}</p>
</body>
</html>
