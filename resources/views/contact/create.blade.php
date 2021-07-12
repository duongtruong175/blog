<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add contact</title>
</head>
<body>
    <h2>{{ __('Add') }}</h2>
    <form action="/contact" method="POST">
        <div>
            <label for="name">{{ __('Name') }}:</label>
            <input type="text" name="name" id="name" required maxlength="256">
        </div>
        <div>
            <label for="address">{{ __('Address') }}:</label>
            <input type="text" name="address" id="address" required maxlength="256">
        </div>
        <div>
            <label for="email">{{ __('Email') }}:</label>
            <input type="email" name="email" id="email" required maxlength="256">
        </div>
        <div>
            <label for="content">{{ __('Content') }}:</label>
            <input type="text" name="content" id="content" required>
        </div>
        <div>
            <button type="submit">Add</button>
        </div>
    </form>

</body>
</html>
