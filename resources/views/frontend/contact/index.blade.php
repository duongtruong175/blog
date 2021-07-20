<x-app-layout>
    <x-slot name="title">
        Contacts
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact table
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Address</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Content</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr class="bg-gray-100">
                                    <td class="border px-4 py-2">{{ $contact->name }}</td>
                                    <td class="border px-4 py-2">{{ $contact->address }}</td>
                                    <td class="border px-4 py-2">{{ $contact->email }}</td>
                                    <td class="border px-4 py-2">{{ $contact->content }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('contacts.show', $contact->id) }}">
                                            <button class="ml-0">
                                                <div class="text-blue-500" style="font-size: 85%">
                                                    View
                                                </div>
                                            </button>
                                        </a>
                                        <div class="inline-block mx-3 h-5 w-px bg-gray-500"></div>
                                        <a class="inline-block">
                                            <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="ml-0">
                                                    <div class="text-blue-500" style="font-size: 85%">
                                                        Delete
                                                    </div>
                                                </button>
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br/>
                    <div class="mt-4">
                        <a href="{{ route('contacts.create') }}">
                            <x-button class="ml-3 bg-blue-500">
                                Add
                            </x-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>