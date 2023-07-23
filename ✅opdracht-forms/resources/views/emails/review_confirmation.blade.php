<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Review bevestiging</title></head>
<body>
    <h1>Review confirmation</h1>

    <p>Thank you for submitting a review. We have received the following information:</p>

    <ul>
        <li>Name: {{ $data['name'] }}</li>
        <li>Email address: {{ $data['email'] }}</li>
        <li>Score: {{ $data['score'] }}</li>
        <li>Review: {{ $data['review'] }}</li>
    </ul>

</body>
</html>