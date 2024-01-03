@extends('user.layouts.app')

@section('content')
    <section class="mx-auto max-w-7xl border-b border-[#DDDDDE] pt-10 pb-[200px]">
        <div class="w-[1200px] mx-auto border-b border-[#DDDDDE] pl-24">
            <p class="font-displat font-bold text-[30px] text-dark mb-14">Ticket Options</p>
            <div class="flex items-start justify-between gap-x-11">
                <div class="w-full">
                    <img src="{{ Storage::url('banners/' . $event->banner) }}" alt="ticket"
                        class="object-cover w-full border rounded-md border-dark">
                </div>
                <div class="flex flex-col items-start w-full gap-y-5">
                    <p class="font-sans text-2xl font-bold text-dark capitalize">{{ $event->name }}</p>
                    <div class="flex items-center justify-start">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.5 7.15909C13.5 12.0682 9 15.75 9 15.75C9 15.75 4.5 12.0682 4.5 7.15909C4.5 4.70455 5.90625 2.25 9 2.25C12.0937 2.25 13.5 4.70455 13.5 7.15909Z"
                                stroke="#1B1B25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <circle cx="9" cy="6.75" r="1.5" stroke="#1B1B25" stroke-width="1.5" />
                        </svg>
                        <p class="font-sans text-[18px] ml-2">{{ $event->location }}, {{ $event->city }}</p>
                    </div>
                    <div class="flex items-center justify-start">
                        <svg width="18" height="18" viewBox="0 0 16 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.25 4.75C1.25 3.50736 2.25736 2.5 3.5 2.5H12.5C13.7426 2.5 14.75 3.50736 14.75 4.75V10.75C14.75 11.9926 13.7426 13 12.5 13H3.5C2.25736 13 1.25 11.9926 1.25 10.75V4.75Z"
                                stroke="#1B1B25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5 1V2.5" stroke="#1B1B25" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M11 1V2.5" stroke="#1B1B25" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <circle cx="5" cy="5.5" r="0.75" fill="#1B1B25" />
                            <circle cx="8" cy="5.5" r="0.75" fill="#1B1B25" />
                            <circle cx="11" cy="5.5" r="0.75" fill="#1B1B25" />
                            <circle cx="5" cy="8.5" r="0.75" fill="#1B1B25" />
                        </svg>

                        <p class="font-sans text-[18px] ml-2">{{ date('j F Y', strtotime($event->stage_date)) }}</p>
                    </div>
                    <p class="font-sans text-lg text-justify">
                        {{ $event->description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="w-[1200px] mx-auto pt-20">
            <div class="grid grid-cols-4 mb-20 gap-x-5 gap-y-8">
                @foreach ($event->tickets as $ticket)
                    <div class="flex flex-col gap-y-4 group">
                        <button type="button" id="ticket_id"
                            class="rounded-md flex-grow border border-[#DDDDDE] px-7 pt-5 pb-20 flex flex-col items-center group-hover:border-[#0802A3] group-hover:border-b-[6px] group-hover:border-r-[6px] group-hover:border-t-[3px] group-hover:border-l-[3px]">
                            <p class="flex-grow mb-4 text-2xl font-bold font-display text-dark">{{ $ticket->name }}</p>
                            <p class="flex-grow font-sans text-sm text-center text-dark mb-7">
                                {{ $ticket->description }}
                            </p>
                            <p class="font-sans text-2xl font-semibold text-center text-dark">
                                {{ Number::currency($ticket->price, 'IDR', 'id_ID') }}</p>
                        </button>
                        <div class="mx-auto w-fit">
                            <a href="{{ route('user.checkout', $ticket) }}" id="checkout_btn"
                                class="px-3 py-2 mx-auto text-sm group-hover:block hidden text-center text-white rounded-lg w-fit bg-purple font-display">
                                Continue to Payment
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    {{-- <script>
        const ticketButton = document.querySelector("#ticket_id");
        const checkoutButton = document.querySelector("#checkout_btn");
        ticketButton.addEventListener("click", function() {
            checkoutButton.classList.toggle("hidden");
        });
    </script> --}}
@endsection
