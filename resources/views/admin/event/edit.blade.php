<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-4">Edit Event <span class="font-medium uppercase">{{ $event->name }}</span></h1>
                    <form action="{{ route('admin.events.update', $event->slug) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="grid grid-cols-1 gap-5 mb-10 sm:grid-cols-3">
                            <div>
                                <x-input-label for="name" :value="__('Event Name')" />
                                <x-text-input id="name" name="name" type="text"
                                    class="block w-full mt-1 text-sm" :value="old('name', $event->name)" autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div>
                                <x-input-label for="location" :value="__('Location')" />
                                <x-text-input id="location" name="location" type="text"
                                    class="block w-full mt-1 text-sm" :value="old('location', $event->location)" autocomplete="location" />
                                <x-input-error class="mt-2" :messages="$errors->get('location')" />
                            </div>
                            <div>
                                <x-input-label for="city" :value="__('City')" />
                                <x-text-input id="city" name="city" type="text"
                                    class="block w-full mt-1 text-sm" :value="old('city', $event->city)" autocomplete="city" />
                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                            </div>
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Event
                                    Description
                                </label>
                                <textarea id="description" name="description" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write your thoughts here...">{{ $event->description }}
                                </textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                            <div class="">
                                <x-input-label for="duration" :value="__('Duration')" />
                                <x-text-input id="duration" name="duration" type="text"
                                    class="block w-full mt-1 text-sm" :value="old('duration', $event->duration)" autocomplete="duration" />
                                <x-input-error class="mt-2" :messages="$errors->get('duration')" />
                            </div>
                            <div class="">
                                <x-input-label for="audience" :value="__('Audience')" />
                                <x-text-input id="audience" name="audience" type="text"
                                    class="block w-full mt-1 text-sm" :value="old('audience', $event->audience)" autocomplete="audience" />
                                <x-input-error class="mt-2" :messages="$errors->get('audience')" />
                            </div>
                            <div class="">
                                <x-input-label for="attention" :value="__('Attention')" />
                                <x-text-input id="attention" name="attention" type="text"
                                    class="block w-full mt-1 text-sm" :value="old('attention', $event->attention)" autocomplete="attention" />
                                <x-input-error class="mt-2" :messages="$errors->get('attention')" />
                            </div>
                            <div class="">
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                                    Event Banner</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                                    id="file_input" name="banner" type="file">
                                <x-input-error class="mt-2" :messages="$errors->get('banner')" />
                            </div>
                            <div class="">
                                <x-input-label for="stage_date" :value="__('Event Date')" />
                                <x-text-input id="stage_date" name="stage_date" type="date"
                                    class="block w-full mt-1 text-sm" :value="old('stage_date', $event->stage_date)" autocomplete="stage_date" />
                                <x-input-error class="mt-2" :messages="$errors->get('stage_date')" />
                            </div>
                            <div class="">
                                <x-input-label for="presale_date" :value="__('Presale Ticket Date')" />
                                <x-text-input id="presale_date" name="presale_date" type="date"
                                    class="block w-full mt-1 text-sm" :value="old('presale_date', $event->presale_date)" autocomplete="presale_date" />
                                <x-input-error class="mt-2" :messages="$errors->get('presale_date')" />
                            </div>
                        </div>
                        <x-primary-button>Update Event</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
