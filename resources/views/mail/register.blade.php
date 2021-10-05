<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    <p>Dear Admin,</p>
    <br />
    <p>Web blog application has a new registered user. User's information:</p>
    <p>Name: {{ $content['name'] }}</p>
    <p>Email: {{ $content['email'] }}</p>
    <br />
    <p>Thank you for reading.</p>
</body>
</html>