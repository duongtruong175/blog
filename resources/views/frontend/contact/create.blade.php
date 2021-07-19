<x-app-layout>
    <x-slot name="title">
        Contacts
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add contact
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('contacts.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-label for="name" :value="'Name'" />
                            <x-input class="block mt-1 w-full" type="text" name="name" id="name" required maxlength="256" autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="address" :value="'Address'" />
                            <x-input class="block mt-1 w-full" type="text" name="address" id="address" required maxlength="256" />
                        </div>
                        <div class="mt-4">
                            <x-label for="email" :value="'Email'" />
                            <x-input class="block mt-1 w-full" type="email" name="email" id="email" required maxlength="256" />
                        </div>
                        <div class="mt-4">
                            <x-label for="content" :value="'Content'" />
                            <x-input class="block mt-1 w-full" type="text" name="content" id="content" required />
                        </div>
                        <div class="mt-4">
                            <x-button class="ml-3 bg-blue-500" type="submit">
                                Add
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>