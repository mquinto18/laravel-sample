<nav x-data="{ open: false }" class="bg-[#6B5EE6] border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class=" " />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex ">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class='text-white'>
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class='text-white'>
                        {{ __('Services') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class='text-white'>
                        {{ __('About') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard') " class='text-white'>
                        {{ __('Contact  ') }}
                    </x-nav-link>
                </div>
          

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @if(Auth::check())  <!-- Check if the user is logged in -->
                    <!-- Display user name and dropdown menu if logged in -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-1 bg-white shadow-md text-sm leading-4 font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div class='flex justify-center items-center gap-3'>
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class='border border-[#5EA7E6] text-[#5EA7E6] rounded-full h-5 w-5 flex justify-center items-center p-[15px]'>
                                        {{ strtoupper(substr(explode(' ', Auth::user()->name)[0], 0, 1)) }}{{ strtoupper(substr(explode(' ', Auth::user()->name)[1] ?? '', 0, 1)) }} <!-- Combined Initials -->
                                    </div>
                                </div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
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
                @else  <!-- If the user is not logged in, display SIGNUP and LOGIN -->
                    <div class="flex justify-center items-center gap-2 bg-white text-black px-6 font-medium py-2 shadow-md rounded-[10px]">
                        <div class="text-[14px]">
                            <a href="{{ route('register') }}" class='no-underline text-black'>Singup</a>
                        </div>
                        <div class='w-[2px] h-5 bg-[#6B5EE6]'></div>
                        <div class="text-[14px]">
                            <a href="{{ route('login') }}" class='no-underline text-black'>Login</a>
                        </div>
                    </div>
                @endif
            </div>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    
</nav>
