<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-12">
                        <h1 class="">Event Information Detail <span
                                class="font-medium uppercase">{{ $event->name }}</span>
                        </h1>
                        <form action="{{ route('admin.events.toogleStatus', $event->slug) }}" method="post">
                            @csrf
                            <x-primary-button>{{ $event->is_draft ? 'Mark as Active' : 'Draft an Event' }}</x-primary-button>
                        </form>
                    </div>
                    <div class="grid items-start grid-cols-1 mb-8 md:grid-cols-2 gap-x-8 gap-y-4 md:gap-y-0">
                        <img src="{{ Storage::url('banners/' . $event->banner) }}" alt="banner"
                            class="border-2 rounded-md border-gray-950">
                        <div class="flex flex-col gap-y-2">
                            <div class="flex items-center justify-between">
                                <p class="text-base">Location</p>
                                <p class="font-medium text-right">{{ $event->location }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-base">City</p>
                                <p class="font-medium text-right">{{ $event->city }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-base">Stage Date</p>
                                <p class="font-medium text-right">{{ date('j F Y', strtotime($event->stage_date)) }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-base">Duration</p>
                                <p class="font-medium text-right">{{ $event->duration }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-base">Audience</p>
                                <p class="font-medium text-right">{{ $event->audience }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-base">Attention</p>
                                <p class="font-medium text-right">{{ $event->attention }}</p>
                            </div>
                            <p>Description</p>
                            <p class="text-sm tracking-wide text-justify text-gray-600">{{ $event->description }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-8">
                        <h1 class="font-medium uppercase">Tickets Information</h1>
                        <a class="px-3 py-2 text-xs font-medium text-center text-white rounded-md bg-cyan-700"
                            href="{{ route('admin.tickets.create', $event->slug) }}">Add Ticket</a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Ticket ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ticket name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ticket Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Quota Left
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($event->tickets->sortByDesc('price') as $ticket)
                                    <tr class="border-b odd:bg-white even:bg-gray-50">
                                        <td class="px-6 py-4 text-sm uppercase">
                                            #{{ $ticket->code }}
                                        </td>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 uppercase whitespace-nowrap">
                                            {{ $ticket->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ Number::currency($ticket->price, 'IDR', 'id_ID') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $ticket->quota }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.tickets.edit', $ticket->code) }}"
                                                class="font-medium text-indigo-800 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border-b odd:bg-white even:bg-gray-50">
                                        <th colspan="5" scope="row"
                                            class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap">
                                            This Event didn't have tickets
                                        </th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
