@extends('user.layouts.app')

@section('content')
    <section class="mx-auto max-w-7xl border-b border-[#DDDDDE] pt-10 pb-[200px]">
        <p class="font-display font-bold text-dark text-[30px] mb-16">Buyer Contact Information</p>
        <div class="grid grid-cols-11 gap-x-5">
            <div class="flex flex-col items-start col-span-6 gap-y-10 pr-5 border-r-2 border-[#DDDDDE]">
                <div class="py-4 pl-10 pr-20 bg-[#F0EFFE] rounded-md">
                    <p class="font-sans text-sm font-medium text-purple">
                        E-tickets will be sent to your email address, please make sure your email
                        address is correct.
                    </p>
                </div>
                <form action="{{ route('transaction.checkout', $ticket) }}" method="post">
                    @csrf
                    <div class="grid w-full grid-cols-2 gap-x-5 gap-y-10 mb-[100px]">
                        <div class="">
                            <label for="first_name" class="font-sans text-[16px] text-dark font-medium">
                                Full Name
                            </label>
                            <input type="text" name="name" required value="{{ Auth::user()->name }}"
                                class="w-full py-3 pl-3 mt-4 border-2 rounded-md border-dark font-sans font-medium text-dark text-[16px]">
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="">
                            <label for="phone_number" class="font-sans text-[16px] text-dark font-medium">
                                Phone Number
                            </label>
                            <input type="number" name="phone_number" value="{{ Auth::user()->phone_number }}"
                                class="w-full py-3 pl-3 mt-4 border-2 rounded-md border-dark font-sans font-medium text-dark text-[16px]">
                            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                        </div>
                        <div class="">
                            <label for="email" class="font-sans text-[16px] text-dark font-medium">
                                Email Address
                            </label>
                            <input type="email" name="email" required value="{{ Auth::user()->email }}"
                                class="w-full py-3 pl-3 mt-4 border-2 rounded-md border-dark font-sans font-medium text-dark text-[16px]">
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div class="">
                            <label for="confirm_email" class="font-sans text-[16px] text-dark font-medium">
                                Confirm Email Address
                            </label>
                            <input type="email" name="confirm_email"
                                class="w-full py-3 pl-3 mt-4 border-2 rounded-md border-dark font-sans font-medium text-dark text-[16px]">
                            <x-input-error class="mt-2" :messages="$errors->get('confirm_email')" />
                        </div>
                    </div>
                    <button type="submit"
                        class="px-6 py-4 font-sans text-sm font-semibold text-white rounded-md max-w-fit bg-purple">
                        Continue to Payment
                    </button>
                </form>
            </div>
            <div class="flex flex-col items-start w-full col-span-4">
                <p class="mb-8 font-sans text-2xl font-semibold tex-dark">Event Details</p>
                <div class="grid items-stretch grid-cols-5 mb-6 gap-x-5">
                    <img src="{{ Storage::url('banners/' . $ticket->event->banner) }}" alt="banner"
                        class="col-span-2 border-2 rounded-md border-dark">
                    <div class="flex flex-col items-start col-span-3 gap-y-2">
                        <p class="font-sans font-semibold text-dark text-[16px] capitalize">{{ $ticket->event->name }}</p>
                        <div class="flex items-center justify-start">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.5 7.15909C13.5 12.0682 9 15.75 9 15.75C9 15.75 4.5 12.0682 4.5 7.15909C4.5 4.70455 5.90625 2.25 9 2.25C12.0937 2.25 13.5 4.70455 13.5 7.15909Z"
                                    stroke="#1B1B25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <circle cx="9" cy="6.75" r="1.5" stroke="#1B1B25" stroke-width="1.5" />
                            </svg>
                            <p class="ml-2 font-sans text-sm font-medium">{{ $ticket->event->location }},
                                {{ $ticket->event->city }}</p>
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
                            <p class="ml-2 font-sans text-sm font-medium">
                                {{ date('j F Y', strtotime($ticket->event->stage_date)) }}</p>
                        </div>
                    </div>
                </div>
                <div class="w-full pt-4 pb-8 border-t-2 border-b-2 border-dashed border-purple">
                    <p class="mb-6 font-sans text-xl font-semibold text-dark">Order Summary</p>
                    <div class="flex items-center justify-between">
                        <p class="font-sans text-dark text-[16px]">Ticket Type</p>
                        <p class="font-sans font-semibold text-dark text-[16px] text-right">1 x {{ $ticket->name }}</p>
                    </div>
                </div>
                <div class="flex flex-col w-full pt-4 pb-8 border-b-2 border-dashed border-purple gap-y-6">
                    <div class="flex items-center justify-between">
                        <p class="font-sans text-dark text-[16px]">Ticket Price</p>
                        <p class="font-sans font-semibold text-dark text-[16px] text-right">1 x
                            {{ Number::currency($ticket->price, 'IDR', 'id_ID') }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-sans text-dark text-[16px]">Service & Handling</p>
                        <p class="font-sans font-semibold text-dark text-[16px] text-right">-</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-sans text-dark text-[16px]">Admin Fee</p>
                        <p class="font-sans font-semibold text-dark text-[16px] text-right">-</p>
                    </div>
                </div>
                <div class="w-full pt-4 pb-8">
                    <div class="flex items-center justify-between">
                        <p class="font-sans font-semibold text-dark text-[16px]">Total</p>
                        <p class="font-sans font-semibold text-dark text-[16px] text-right">
                            {{ Number::currency($ticket->price, 'IDR', 'id_ID') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
