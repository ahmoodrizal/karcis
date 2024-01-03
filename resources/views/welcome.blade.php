@extends('user.layouts.app')

@section('content')
    <!-- Hero Section Start -->
    <section class="mx-auto max-w-[1440px] border-b border-[#DDDDDE]">
        <div class="pt-14 md:pt-[153px] pb-24 md:pb-[232px] mx-auto relative">
            <div class="flex justify-between">
                <img src="{{ asset('images/pablita-794.png') }}" alt=""
                    class="absolute top-0 left-5 w-[43px] md:w-[100px]">
                <img src="{{ asset('images/pablita-794.png') }}" alt=""
                    class="absolute top-0 right-5 w-[43px] md:w-[100px]">
            </div>
            <p class="font-display text-[30px] md:text-[64px] font-bold text-purple text-center">
                Exclusive events, priceless moments
            </p>
            <div class="flex justify-between px-5 md:px-0">
                <img src="{{ asset('images/pablita-693.png') }}" alt="dec1"
                    class="md:w-[334px] w-[167px] absolute -bottom-[6px]">
                <img src="{{ asset('images/pablita-251 1.png') }}" alt="dec2"
                    class="absolute bottom-0 left-[350px] hidden md:block">
                <img src="{{ asset('images/pablita-woman-10 1.png') }}" alt="dec3"
                    class="absolute bottom-0 left-[535px] hidden md:block">
                <img src="{{ asset('images/pablita-man-15 1.png') }}" alt="dec4"
                    class="absolute bottom-0 left-[750px] hidden md:block">
                <img src="{{ asset('images/pablita-woman-16 1.png') }}" alt="dec5"
                    class="absolute bottom-0 right-[375px] hidden md:block">
                <img src="{{ asset('images/pablita-673 1.png') }}" alt="dec6"
                    class="absolute right-5 -bottom-[6px] w-[167px] md:w-[334px]">
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Search Section Start -->
    <section class="mx-auto w-[340px] md:w-[850px] relative -top-7 md:-top-10 pb-20">
        <div
            class="flex items-center justify-between md:px-5 px-[10px] md:py-4 py-3 rounded-[4px] bg-white border-[3px] border-solid border-dark">
            <div class="w-4/5">
                <input type="text"
                    class="font-sans text-[10px] md:text-[16px] text-[#5C5C5F] w-full focus:outline-none border-transparent focus:border-transparent focus:ring-0"
                    placeholder="Search by events, name, location, and more">
            </div>
            <button
                class="flex items-center justify-between rounded-[4px] bg-purple text-white font-sans font-medium text-sm px-1 md:px-4 py-1 md:py-[10px]">
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="6.5" cy="7" r="5.25" stroke="white" stroke-width="2" />
                    <path d="M14.75 15.25L10.25 10.75" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <p class="hidden ml-1 md:block">Search</p>
            </button>
        </div>
    </section>
    <!-- Search Section End -->

    <!-- Upcoming Event Section Start -->
    <section class="mx-auto mb-20 max-w-7xl">
        <div class="flex items-center justify-between mb-4 md:mb-8">
            <p class="font-bold text-lg md:text-[30px] font-display text-dark">Upcoming Events</p>
            <div class="flex items-center justify-between">
                <p class="mr-1 text-xs font-medium md:text-sm font-display text-purple">View All</p>
                <svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.75 1L6.25 5.5L1.75 10" stroke="#4F4CEE" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
        </div>
        <div class="grid grid-cols-2 px-5 md:grid-cols-4 md:px-0 gap-x-4 md:gap-x-5">
            @foreach ($events as $event)
                <div class="border-[#DDDDDE] border-2 rounded-md overflow-hidden">
                    <a href="{{ route('event.detail', $event) }}">
                        <div class="h-[180px]">
                            <img src="{{ Storage::url('banners/' . $event->banner) }}" alt="banner"
                                class="object-cover w-full h-full">
                        </div>
                        <div
                            class="flex items-center py-[10px] md:py-4 pl-4 md:pl-5 pr-8 md:pr-10 bg-white gap-x-4 md:gap-x-8">
                            <div class="flex flex-col items-center font-sans text-[10px] md:text-sm font-bold text-dark">
                                <p>{{ date('M', strtotime($event->stage_date)) }}</p>
                                <p>{{ date('d', strtotime($event->stage_date)) }}</p>
                            </div>
                            <div class="flex flex-col items-start font-sans gap-y-[6px]">
                                <div class="flex-grow">
                                    <p class="text-sm md:text-[16px] font-bold text-dark uppercase">{{ $event->name }}</p>
                                    <p class="text-[10px] md:text-sm text-dark">Rp450.000</p>
                                </div>
                                <div class="flex">
                                    <div class="w-[10px] h-[10px]">
                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1203_1832)">
                                                <path
                                                    d="M8.00004 1.83337C5.42004 1.83337 3.33337 3.92004 3.33337 6.50004C3.33337 10 8.00004 15.1667 8.00004 15.1667C8.00004 15.1667 12.6667 10 12.6667 6.50004C12.6667 3.92004 10.58 1.83337 8.00004 1.83337ZM4.66671 6.50004C4.66671 4.66004 6.16004 3.16671 8.00004 3.16671C9.84004 3.16671 11.3334 4.66004 11.3334 6.50004C11.3334 8.42004 9.41337 11.2934 8.00004 13.0867C6.61337 11.3067 4.66671 8.40004 4.66671 6.50004Z"
                                                    fill="#1B1B25" />
                                                <path
                                                    d="M8.00004 8.16671C8.92052 8.16671 9.66671 7.42052 9.66671 6.50004C9.66671 5.57957 8.92052 4.83337 8.00004 4.83337C7.07957 4.83337 6.33337 5.57957 6.33337 6.50004C6.33337 7.42052 7.07957 8.16671 8.00004 8.16671Z"
                                                    fill="#1B1B25" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1203_1832">
                                                    <rect width="16" height="16" fill="white"
                                                        transform="translate(0 0.5)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <p class="text-[10px] md:text-sm ml-1 md:ml-[6px]">{{ $event->location }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Upcoming Event Section End -->

    <!-- Promo Section Start  -->
    <section class="mx-auto mb-20 max-w-7xl">
        <div class="flex items-end justify-between mb-8">
            <p class="font-bold text-[30px] font-display text-dark">Hot Offers</p>
            <div class="flex items-center justify-between">
                <p class="mr-1 text-sm font-medium font-display text-purple">View All</p>
                <svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.75 1L6.25 5.5L1.75 10" stroke="#4F4CEE" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-x-5">
            <div class="h-[340px] bg-[#F9E8D9] rounded-md"></div>
            <div class="h-[340px] bg-[#F9E8D9] rounded-md"></div>
        </div>
    </section>
    <!-- Promo Section End  -->
@endsection
