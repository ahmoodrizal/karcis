<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-8">Update Ticket {{ $ticket->name }} for event {{ $ticket->event->name }}</h1>
                    <form action="{{ route('admin.tickets.update', $ticket->code) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="grid grid-cols-1 mb-8 md:grid-cols-3 gap-x-4 gap-y-4">
                            <div>
                                <x-input-label for="name" :value="__('Ticket Name')" />
                                <x-text-input id="name" name="name" type="text"
                                    class="block w-full mt-1 text-sm" :value="old('name', $ticket->name)" autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div>
                                <x-input-label for="price" :value="__('Ticket price')" />
                                <x-text-input id="price" name="price" type="number"
                                    class="block w-full mt-1 text-sm" :value="old('price', $ticket->price)" autofocus
                                    autocomplete="price" />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>
                            <div>
                                <x-input-label for="quota" :value="__('Ticket quota')" />
                                <x-text-input id="quota" name="quota" type="number"
                                    class="block w-full mt-1 text-sm" :value="old('quota', $ticket->quota)" autofocus
                                    autocomplete="quota" />
                                <x-input-error class="mt-2" :messages="$errors->get('quota')" />
                            </div>
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Ticket
                                    Description</label>
                                <textarea id="description" name="description" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write your thoughts here...">{{ $ticket->description }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                        </div>
                        <x-primary-button>Save Changes</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
