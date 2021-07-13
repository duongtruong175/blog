<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View contact</title>
</head>
<body>
    <div>
        <p>Name: {{ $contact['name'] }}</p>
    </div>
    <div>
        <p>Address: {{ $contact['address'] }}</p>
    </div>
    <div>
        <p>Email: {{ $contact['email'] }}</p>
    </div>
    <div>
        <p>Content: {{ $contact['content'] }}</p>
    </div>
</body>
</html>
