@extends('user.layouts.app')

@section('content')
    <section class="mx-auto max-w-7xl border-b border-[#DDDDDE] pt-10 pb-[200px]">
        <p class="font-display font-bold text-dark text-[30px] mb-14">Payment Method</p>
        <form action="{{ route('transaction.payment', $transaction) }}" method="post">
            @csrf
            @method('put')
            <div class="grid grid-cols-11 gap-x-5">
                <div class="flex flex-col items-start col-span-6 gap-y-10 pr-5 border-r-2 border-[#DDDDDE]">
                    <div class="flex flex-col w-full gap-y-8">
                        <p class="font-sans text-2xl font-semibold text-dark">Credit Card</p>
                        <div class="flex items-center border-2 rounded-md gap-x-4 border-[#DDDDDE] py-[10px] pl-5">
                            <input id="cc" type="radio" value="credit_card" name="payment_id"
                                class="w-4 h-4 bg-gray-100 border-gray-300 text-purple focus:ring-purple focus:ring-2">
                            <label for="cc" class="font-sans text-sm font-medium text-dark">
                                Credit/Debit Card
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-col w-full gap-y-8">
                        <p class="font-sans text-2xl font-semibold text-dark">Virtual Account</p>
                        <div class="flex flex-col gap-y-4">
                            <div
                                class="flex items-center justify-between border-2 rounded-md gap-x-4 border-[#DDDDDE] py-[10px] px-5">
                                <div class="flex items-center gap-x-5">
                                    <input id="va_bca" type="radio" value="bca" name="payment_id"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 text-purple focus:ring-purple focus:ring-2">
                                    <label for="va_bca" class="font-sans text-sm font-medium text-dark">
                                        BCA Virtual Account
                                    </label>
                                </div>
                                <img src="{{ asset('images/bca.png') }}" alt="va_bca">
                            </div>
                            <div
                                class="flex items-center justify-between border-2 rounded-md gap-x-4 border-[#DDDDDE] py-[10px] px-5">
                                <div class="flex items-center gap-x-5">
                                    <input id="va_bni" type="radio" value="bni" name="payment_id"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 text-purple focus:ring-purple focus:ring-2">
                                    <label for="va_bni" class="font-sans text-sm font-medium text-dark">
                                        BNI Virtual Account
                                    </label>
                                </div>
                                <img src="{{ asset('images/bni.png') }}" alt="va_bni">
                            </div>
                            <div
                                class="flex items-center justify-between border-2 rounded-md gap-x-4 border-[#DDDDDE] py-[10px] px-5">
                                <div class="flex items-center gap-x-5">
                                    <input id="va_mandiri" type="radio" value="mandiri" name="payment_id"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 text-purple focus:ring-purple focus:ring-2">
                                    <label for="va_mandiri" class="font-sans text-sm font-medium text-dark">
                                        Mandiri Virtual Account
                                    </label>
                                </div>
                                <img src="{{ asset('images/mandiri.png') }}" alt="va_mandiri">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full gap-y-8">
                        <p class="font-sans text-2xl font-semibold text-dark">Electronic Money</p>
                        <div class="flex flex-col gap-y-4">
                            <div
                                class="flex items-center justify-between border-2 rounded-md gap-x-4 border-[#DDDDDE] py-[10px] px-5">
                                <div class="flex items-center gap-x-5">
                                    <input id="em_gopay" type="radio" value="gopay" name="payment_id"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 text-purple focus:ring-purple focus:ring-2">
                                    <label for="em_gopay" class="font-sans text-sm font-medium text-dark">
                                        Gopay
                                    </label>
                                </div>
                                <img src="{{ asset('images/gopay.png') }}" alt="em_gopay">
                            </div>
                            <div
                                class="flex items-center justify-between border-2 rounded-md gap-x-4 border-[#DDDDDE] py-[10px] px-5">
                                <div class="flex items-center gap-x-5">
                                    <input id="em_ovo" type="radio" value="ovo" name="payment_id"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 text-purple focus:ring-purple focus:ring-2">
                                    <label for="em_ovo" class="font-sans text-sm font-medium text-dark">
                                        OVO
                                    </label>
                                </div>
                                <img src="{{ asset('images/ovo.png') }}" alt="em_ovo">
                            </div>
                            <div
                                class="flex items-center justify-between border-2 rounded-md gap-x-4 border-[#DDDDDE] py-[10px] px-5">
                                <div class="flex items-center gap-x-5">
                                    <input id="em_linkaja" type="radio" value="link_aja" name="payment_id"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 text-purple focus:ring-purple focus:ring-2">
                                    <label for="em_linkaja" class="font-sans text-sm font-medium text-dark">
                                        Link Aja
                                    </label>
                                </div>
                                <img src="{{ asset('images/linkaja.png') }}" alt="em_linkaja">
                            </div>
                            <div
                                class="flex items-center justify-between border-2 rounded-md gap-x-4 border-[#DDDDDE] py-[10px] px-5">
                                <div class="flex items-center gap-x-5">
                                    <input id="em_shopeepay" type="radio" value="shopee_pay" name="payment_id"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 text-purple focus:ring-purple focus:ring-2">
                                    <label for="em_shopeepay" class="font-sans text-sm font-medium text-dark">
                                        Shopee Pay
                                    </label>
                                </div>
                                <img src="{{ asset('images/shopeepay.png') }}" alt="em_shopeepay">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-start w-full col-span-4">
                    <p class="mb-8 font-sans text-2xl font-semibold tex-dark">Event Details</p>
                    <div class="grid items-stretch grid-cols-5 mb-6 gap-x-5">
                        <img src="{{ Storage::url('banners/' . $transaction->ticket->event->banner) }}" alt="banner"
                            class="col-span-2 border-2 rounded-md border-dark">
                        <div class="flex flex-col items-start col-span-3 gap-y-2">
                            <p class="font-sans font-semibold text-dark text-[16px] capitalize">
                                {{ $transaction->ticket->event->name }}</p>
                            <div class="flex items-center justify-start">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.5 7.15909C13.5 12.0682 9 15.75 9 15.75C9 15.75 4.5 12.0682 4.5 7.15909C4.5 4.70455 5.90625 2.25 9 2.25C12.0937 2.25 13.5 4.70455 13.5 7.15909Z"
                                        stroke="#1B1B25" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <circle cx="9" cy="6.75" r="1.5" stroke="#1B1B25" stroke-width="1.5" />
                                </svg>
                                <p class="ml-2 font-sans text-sm font-medium">{{ $transaction->ticket->event->location }},
                                    {{ $transaction->ticket->event->city }}</p>
                            </div>
                            <div class="flex items-center justify-start">
                                <svg width="18" height="18" viewBox="0 0 16 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.25 4.75C1.25 3.50736 2.25736 2.5 3.5 2.5H12.5C13.7426 2.5 14.75 3.50736 14.75 4.75V10.75C14.75 11.9926 13.7426 13 12.5 13H3.5C2.25736 13 1.25 11.9926 1.25 10.75V4.75Z"
                                        stroke="#1B1B25" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
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
                                    {{ date('j F Y', strtotime($transaction->ticket->event->stage_date)) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full pt-4 pb-8 border-t-2 border-b-2 border-dashed border-purple">
                        <p class="mb-6 font-sans text-xl font-semibold text-dark">Order Summary</p>
                        <div class="flex items-center justify-between">
                            <p class="font-sans text-dark text-[16px]">Ticket Type</p>
                            <p class="font-sans font-semibold text-dark text-[16px] text-right">1 x
                                {{ $transaction->ticket->name }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col w-full pt-4 pb-8 border-b-2 border-dashed border-purple gap-y-6">
                        <div class="flex items-center justify-between">
                            <p class="font-sans text-dark text-[16px]">Ticket Price</p>
                            <p class="font-sans font-semibold text-dark text-[16px] text-right">1 x
                                {{ Number::currency($transaction->ticket->price, 'IDR', 'id_ID') }}</p>
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
                                {{ Number::currency($transaction->total_price, 'IDR', 'id_ID') }}</p>
                        </div>
                    </div>
                    <button type="submit"
                        class="px-[60px] py-4 font-sans text-sm font-semibold text-white rounded-md max-w-fit bg-purple">
                        Pay Now
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection
