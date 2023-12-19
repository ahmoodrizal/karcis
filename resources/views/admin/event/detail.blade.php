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
                    <div class="grid items-start grid-cols-2 mb-8 gap-x-8">
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
                    <h1 class="font-medium uppercase">Tickets Information</h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
