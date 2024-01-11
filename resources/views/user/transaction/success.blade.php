@extends('user.layouts.app')

@section('content')
    <section class="mx-auto max-w-7xl border-b border-[#DDDDDE] pt-10 pb-[200px]">
        <div class="w-[1000px] mx-auto flex flex-col items-center">
            <div class="px-10 py-[10px] rounded-md border-purple border-4 relative bg-white mb-4">
                <p class="font-display text-[48px] text-purple font-bold text-center">
                    {{ $transaction->status == 'success' ? 'Completed' : 'Waiting for Payment' }}
                </p>
                <div class="w-full h-full absolute bg-[#1640D6] rounded-lg -z-10 -bottom-3 -right-3"></div>
            </div>
            <img src="{{ asset('images/pablita-915 1.png') }}" alt="success" class="mb-8">
            @if ($transaction->status == 'success')
                <div class="flex flex-col items-center">
                    <p class="mb-2 font-sans text-2xl font-semibold text-center text-dark">Tickets have been sent to</p>
                    <p class="font-sans text-xl font-semibold text-center text-purple mb-[60px]">{{ auth()->user()->email }}
                    </p>
                    <p class="mb-5 font-sans text-[16px] font-semibold text-center text-dark">Haven’t received tickets yet?
                    </p>
                    <button
                        class="text-purple py-[10px] px-4 rounded-md border-2 border-purple font-sans text-sm mb-[110px]">
                        Resend Tickets
                    </button>
                    <p class="mb-5 font-sans text-[16px] font-semibold text-center text-dark">
                        Having trouble receiving the tickets?
                    </p>
                    <div class="flex items-center justify-between gap-x-8">
                        <div class="flex items-center justify-between gap-x-3">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.122 10.7702L11.1435 11.7487C9.9665 11.1995 8.95527 10.5316 8.20822 9.79177C7.09223 8.68666 6.49549 7.49142 6.25128 6.85648L7.22978 5.87797C7.49997 5.60778 7.49997 5.16971 7.22978 4.89952L4.78365 2.45338C4.51346 2.18319 4.0725 2.17937 3.812 2.45892C2.32082 4.05914 0.488323 6.96413 5.7621 12.2379C11.0359 17.5117 13.9409 15.6792 15.5411 14.188C15.8206 13.9275 15.8168 13.4866 15.5466 13.2164L13.1005 10.7702C12.8303 10.5 12.3922 10.5 12.122 10.7702Z"
                                    stroke="#4F4CEE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="font-sans text-[16px] font-semibold text-center text-purple">rachelgreen@gmail.com</p>
                        </div>
                        <div class="flex items-center justify-between gap-x-3">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 5.25L9 9L15 5.25M3.75 13.5H14.25C15.0784 13.5 15.75 12.8284 15.75 12V6C15.75 5.17157 15.0784 4.5 14.25 4.5H3.75C2.92157 4.5 2.25 5.17157 2.25 6V12C2.25 12.8284 2.92157 13.5 3.75 13.5Z"
                                    stroke="#4F4CEE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="font-sans text-[16px] font-semibold text-center text-purple">karcis@karcis.com</p>
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ $transaction->payment_url }}" target="_blank"
                    class="text-purple py-[10px] px-4 rounded-md border-2 border-purple font-sans text-lg mb-[110px]">
                    Click here to complete payment
                </a>
            @endif

        </div>
    </section>
@endsection
