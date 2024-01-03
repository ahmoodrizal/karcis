    <!-- Navbar Section Start -->
    <header class="mx-auto max-w-[1440px] border-b border-[#DDDDDE]">
        <div class="flex items-center justify-between px-14">
            <div class="py-4">
                <a href="{{ route('welcome') }}" class="text-[30px] font-bold font-displat text-purple">Karcis.com</a>
            </div>
            <div class="flex justify-between py-4 text-lg gap-x-9 font-display text-dark">
                <a href="#" class="hover:text-purple">Concerts</a>
                <a href="#" class="hover:text-purple">Arts</a>
                <a href="#" class="hover:text-purple">Conference</a>
                <a href="#" class="hover:text-purple">Movie</a>
                <a href="#" class="hover:text-purple">International</a>
                @auth
                    <a href="{{ route('user.transactions') }}" class="hover:text-purple">My Tickets</a>
                @endauth
            </div>
            <div class="flex gap-x-9">
                @guest
                    <div class="py-[10px] px-4 rounded-[4px] border-purple border border-solid">
                        <a href="{{ route('login') }}" class="font-sans text-sm font-medium text-purple">Login</a>
                    </div>
                    <div class="py-[10px] px-4 rounded-[4px] border-purple bg-purple border border-solid">
                        <a href="{{ route('register') }}" class="font-sans text-sm font-medium text-white">Sign Up</a>
                    </div>
                @endguest
                @auth
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                @if (Auth::user()->role === 'admin')
                                    <x-dropdown-link :href="route('dashboard')">
                                        {{ __('Admin Area') }}
                                    </x-dropdown-link>
                                @endif
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endauth
            </div>
        </div>
    </header>
    <!-- Navbar Section End -->
