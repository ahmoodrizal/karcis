@extends('user.layouts.app')

@section('content')
    <section class="mx-auto max-w-7xl border-b border-[#DDDDDE] pt-10 pb-[200px]">
        <div class="w-[1000px] mx-auto">
            <div class="w-full rounded-md bg-[#DADAFB] p-6 mb-11">
                <img src="{{ Storage::url('banners/' . $event->banner) }}" alt="banner"
                    class="border rounded-md border-dark h-[300px] w-full object-cover">
            </div>
            <div class="grid items-start justify-between grid-cols-12 mb-16">
                <div class="flex flex-col col-span-7 gap-y-4 text-dark">
                    <p class="font-display font-bold text-[30px] capitalize">{{ $event->name }}</p>
                    <div class="flex items-center justify-start">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.5 7.15909C13.5 12.0682 9 15.75 9 15.75C9 15.75 4.5 12.0682 4.5 7.15909C4.5 4.70455 5.90625 2.25 9 2.25C12.0937 2.25 13.5 4.70455 13.5 7.15909Z"
                                stroke="#1B1B25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <circle cx="9" cy="6.75" r="1.5" stroke="#1B1B25" stroke-width="1.5" />
                        </svg>
                        <p class="font-sans font-medium text-[16px] ml-2">{{ $event->location }}, {{ $event->city }}</p>
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
                        <p class="font-sans font-medium text-[16px] ml-2">{{ date('j F Y', strtotime($event->stage_date)) }}
                        </p>
                    </div>
                    <p class="font-sans text-lg text-justify text-gray-600">{{ $event->description }}</p>
                </div>
                <div class=""></div>
                <div
                    class="flex flex-col items-center col-span-4 px-8 py-5 mt-2 mr-4 bg-white border relative rounded-lg gap-y-4 border-[#828282]">
                    <p class="text-[#4F4F4F] font-sans text-[#16px] text-center">Tickets starting at <br> <span
                            class="font-sans text-xl font-bold text-dark">{{ Number::currency($lowestTicket->price, 'IDR', 'id_ID') }}</span>
                    </p>
                    <a href="{{ route('event.tickets', $event) }}"
                        class="bg-purple hover:bg-indigo-700 hover:font-medium text-center py-[10px] text-white w-full rounded-[4px]"
                        type="button">
                        Buy Tickets
                    </a>
                    <div class="absolute w-full h-full -z-10 rounded-lg bg-[#0802A3] -bottom-[10px] -right-[10px]">
                    </div>
                </div>
            </div>
            <div class="mb-12">
                <p class="text-2xl font-bold font-display text-dark mb-9">Event Information</p>
                <div class="grid grid-cols-3 gap-x-16">
                    <div class="flex items-start gap-x-5">
                        <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M41.5283 18.1055H30.2783C30.085 18.1055 29.9268 18.2637 29.9268 18.457V20.5664C29.9268 20.7598 30.085 20.918 30.2783 20.918H41.5283C41.7217 20.918 41.8799 20.7598 41.8799 20.5664V18.457C41.8799 18.2637 41.7217 18.1055 41.5283 18.1055ZM35.6397 24.082H30.2783C30.085 24.082 29.9268 24.2402 29.9268 24.4336V26.543C29.9268 26.7363 30.085 26.8945 30.2783 26.8945H35.6397C35.833 26.8945 35.9912 26.7363 35.9912 26.543V24.4336C35.9912 24.2402 35.833 24.082 35.6397 24.082ZM20.9751 14.1724H19.0723C18.7998 14.1724 18.5801 14.3921 18.5801 14.6646V25.563C18.5801 25.7212 18.6548 25.8662 18.7822 25.9585L25.3257 30.731C25.5454 30.8892 25.853 30.8452 26.0112 30.6255L27.1406 29.083V29.0786C27.2988 28.8589 27.2505 28.5513 27.0308 28.3931L21.4629 24.3677V14.6646C21.4673 14.3921 21.2432 14.1724 20.9751 14.1724Z"
                                fill="#4F4CEE" />
                            <path
                                d="M35.3672 29.6147H32.8272C32.5811 29.6147 32.3482 29.7422 32.2163 29.9531C31.6582 30.8364 31.0078 31.6538 30.2608 32.4009C28.9732 33.6885 27.4746 34.6992 25.8091 35.4023C24.0821 36.1318 22.2495 36.501 20.3599 36.501C18.4658 36.501 16.6333 36.1318 14.9107 35.4023C13.2451 34.6992 11.7466 33.6885 10.459 32.4009C9.17142 31.1133 8.16067 29.6147 7.45755 27.9492C6.72806 26.2266 6.35892 24.394 6.35892 22.5C6.35892 20.606 6.72806 18.7778 7.45755 17.0508C8.16067 15.3853 9.17142 13.8867 10.459 12.5991C11.7466 11.3115 13.2451 10.3008 14.9107 9.59765C16.6333 8.86816 18.4702 8.49902 20.3599 8.49902C22.2539 8.49902 24.0865 8.86816 25.8091 9.59765C27.4746 10.3008 28.9732 11.3115 30.2608 12.5991C31.0078 13.3462 31.6582 14.1636 32.2163 15.0469C32.3482 15.2578 32.5811 15.3853 32.8272 15.3853H35.3672C35.6704 15.3853 35.8638 15.0688 35.7276 14.8008C32.8623 9.10107 27.0528 5.39648 20.5664 5.32178C11.0699 5.20312 3.18167 12.977 3.16409 22.4648C3.14651 31.9702 10.8501 39.6826 20.3555 39.6826C26.9253 39.6826 32.8316 35.9648 35.7276 30.1992C35.8638 29.9312 35.666 29.6147 35.3672 29.6147Z"
                                fill="#4F4CEE" />
                        </svg>
                        <div class="flex flex-col">
                            <p class="mb-2 text-xl font-bold font-display text-dark">Duration</p>
                            <p class="font-sans text-[16px] text-[#5C5C5F]">{{ $event->duration }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-x-5">
                        <svg width="45" height="45" viewBox="0 0 37 37" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_167_16638)">
                                <path
                                    d="M16.1875 32.375C16.1875 32.375 13.875 32.375 13.875 30.0625C13.875 27.75 16.1875 20.8125 25.4375 20.8125C34.6875 20.8125 37 27.75 37 30.0625C37 32.375 34.6875 32.375 34.6875 32.375H16.1875ZM25.4375 18.5C27.2774 18.5 29.042 17.7691 30.3431 16.4681C31.6441 15.167 32.375 13.4024 32.375 11.5625C32.375 9.72256 31.6441 7.95798 30.3431 6.65695C29.042 5.35591 27.2774 4.625 25.4375 4.625C23.5976 4.625 21.833 5.35591 20.5319 6.65695C19.2309 7.95798 18.5 9.72256 18.5 11.5625C18.5 13.4024 19.2309 15.167 20.5319 16.4681C21.833 17.7691 23.5976 18.5 25.4375 18.5Z"
                                    fill="#4F4CEE" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.062 32.375C11.7192 31.6531 11.5482 30.8616 11.5625 30.0625C11.5625 26.9291 13.135 23.7031 16.0395 21.46C14.5898 21.0133 13.0794 20.7949 11.5625 20.8125C2.3125 20.8125 0 27.75 0 30.0625C0 32.375 2.3125 32.375 2.3125 32.375H12.062Z"
                                    fill="#4F4CEE" />
                                <path
                                    d="M10.4062 18.5C11.9395 18.5 13.41 17.8909 14.4942 16.8067C15.5784 15.7225 16.1875 14.252 16.1875 12.7188C16.1875 11.1855 15.5784 9.71498 14.4942 8.63079C13.41 7.54659 11.9395 6.9375 10.4062 6.9375C8.87297 6.9375 7.40248 7.54659 6.31829 8.63079C5.23409 9.71498 4.625 11.1855 4.625 12.7188C4.625 14.252 5.23409 15.7225 6.31829 16.8067C7.40248 17.8909 8.87297 18.5 10.4062 18.5Z"
                                    fill="#4F4CEE" />
                            </g>
                            <defs>
                                <clipPath id="clip0_167_16638">
                                    <rect width="45" height="45" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <div class="flex flex-col">
                            <p class="mb-2 text-xl font-bold font-display text-dark">Audience</p>
                            <p class="font-sans text-[16px] text-[#5C5C5F] mb-1">
                                {{ $event->audience }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-x-5">
                        <svg width="45" height="45" viewBox="0 0 37 37" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M34.5321 30.9297L19.5008 4.91406C19.2768 4.52744 18.8902 4.33594 18.4999 4.33594C18.1097 4.33594 17.7195 4.52744 17.4991 4.91406L2.46781 30.9297C2.02338 31.7029 2.57982 32.6641 3.46869 32.6641H33.5312C34.4201 32.6641 34.9765 31.7029 34.5321 30.9297ZM17.3437 15.0312C17.3437 14.8723 17.4738 14.7422 17.6327 14.7422H19.3671C19.5261 14.7422 19.6562 14.8723 19.6562 15.0312V21.6797C19.6562 21.8387 19.5261 21.9688 19.3671 21.9688H17.6327C17.4738 21.9688 17.3437 21.8387 17.3437 21.6797V15.0312ZM18.4999 27.75C18.0461 27.7407 17.6139 27.5539 17.2962 27.2297C16.9785 26.9054 16.8006 26.4696 16.8006 26.0156C16.8006 25.5617 16.9785 25.1258 17.2962 24.8016C17.6139 24.4773 18.0461 24.2905 18.4999 24.2812C18.9538 24.2905 19.3859 24.4773 19.7036 24.8016C20.0213 25.1258 20.1993 25.5617 20.1993 26.0156C20.1993 26.4696 20.0213 26.9054 19.7036 27.2297C19.3859 27.5539 18.9538 27.7407 18.4999 27.75Z"
                                fill="#4F4CEE" />
                        </svg>

                        <div class="flex flex-col">
                            <p class="mb-2 text-xl font-bold font-display text-dark">Attention</p>
                            <p class="font-sans text-[16px] text-[#5C5C5F] mb-1">
                                {{ $event->attention }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <p class="mb-2 text-xl font-bold font-display text-dark">Description</p>
                <p class="font-sans text-dark text-[16px] text-justify">
                    {{ $event->description }}
                </p>
            </div>
        </div>
    </section>
@endsection
