<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-8">Tickets Data</h1>
                    <div class="relative mb-4 overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Ticket ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Event Name
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
                                @forelse ($tickets as $ticket)
                                    <tr class="border-b odd:bg-white even:bg-gray-50">
                                        <td class="px-6 py-4 uppercase">
                                            #{{ $ticket->code }}
                                        </td>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 uppercase whitespace-nowrap">
                                            {{ $ticket->event->name }}
                                        </th>
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
                    <div class="">
                        {{ $tickets->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
