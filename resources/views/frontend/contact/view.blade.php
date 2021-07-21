<x-app-layout>
    <x-slot name="title">
        Contacts
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View contact detail
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <p>Name: {{ $contact->name }}</p>
                    </div>
                    <div>
                        <p>Address: {{ $contact->address }}</p>
                    </div>
                    <div>
                        <p>Email: {{ $contact->email }}</p>
                    </div>
                    <div>
                        <p>Content: {{ $contact->content }}</p>
                    </div>
                    <div class="mt-8 flex-row">
                        <a href="{{ url()->previous() }}" class="ml-3 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150" >
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>