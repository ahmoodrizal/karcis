<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-10">
                        <h1>Event Area</h1>
                        <a href="{{ route('admin.events.create') }}"
                            class="px-3 py-2 text-xs font-medium tracking-wider text-center text-white uppercase transition duration-300 ease-in-out bg-gray-900 rounded-md hover:bg-gray-800">
                            Create New Event
                        </a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        {{-- <div class="pb-4 bg-white ">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative mt-1">
                                <div
                                    class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="table-search"
                                    class="block pt-2 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Search for events">
                            </div>
                        </div> --}}
                        <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Event ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Event Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Stage Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Location
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($events as $event)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">
                                            {{ $event->id }}
                                        </td>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 uppercase whitespace-nowrap">
                                            {{ $event->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ date('j F Y', strtotime($event->stage_date)) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $event->location }}, {{ $event->city }}
                                        </td>
                                        <td class="px-6 py-4 uppercase">
                                            {{ $event->is_draft ? 'Draft' : 'Active' }}
                                        </td>
                                        <td class="flex items-center px-6 py-4 gap-x-4">
                                            <a href="{{ route('admin.events.edit', $event->slug) }}"
                                                class="px-3 py-2 text-sm font-medium text-white bg-orange-600 rounded-md hover:underline">Update</a>
                                            <a href="{{ route('admin.events.show', $event->slug) }}"
                                                class="px-3 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:underline">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="6" class="px-6 py-4 text-center">
                                        Events Data Not Found
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $events->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
