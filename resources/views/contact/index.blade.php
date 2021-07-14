<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        table {
            width: 70%;
        }
        table, tr, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h2>Contact table</h2>
    <table>
        <thead>
            <tr>
                <td>Name</td>
                <td>Address</td>
                <td>Email</td>
                <td>Content</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact['name'] }}</td>
                    <td>{{ $contact['address'] }}</td>
                    <td>{{ $contact['email'] }}</td>
                    <td>{{ $contact['content'] }}</td>
                    <td><a href="{{ route('contacts.show', $contact) }}"><button>View</button></a></td>
                    <td>
                        <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br/>
    <a href="{{ route('contacts.create') }}">
        <button>Add</button>
    </a>
</body>
</html>
