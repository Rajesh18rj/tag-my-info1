<nav x-data="{ open: false }" class="bg-black border-b border-gray-900 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">

                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center group">
                    <img
                        src="{{ asset('images/logo4.png') }}"
                        alt="Tag My Info Logo"
                        class="h-14 w-auto object-contain
                   transition-transform duration-300
                   group-hover:scale-105 lg:mr-4 lg:ml-4"
                    >
                </a>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:ms-10 space-x-8">

                    <!-- Dashboard -->
                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                        class="relative inline-flex items-center px-1 text-md font-semibold
                   text-gray-50
                   border-b-0 border-transparent
                   transition-colors duration-300
                   hover:text-red-400

                   after:absolute after:left-0 after:-bottom-1
                   after:h-0.5 after:w-0 after:bg-red-500
                   after:transition-all after:duration-300

                   hover:after:w-1/2
                   aria-[current=page]:after:w-1/2">
                        Dashboard
                    </x-nav-link>

                    <!-- Manage Profiles -->
                    <x-nav-link
                        :href="route('profiles.index')"
                        :active="request()->routeIs('profiles.*')"
                        class="relative inline-flex items-center px-1 text-md font-semibold
                   text-gray-50
                   border-b-0 border-transparent
                   transition-colors duration-300
                   hover:text-red-400

                   after:absolute after:left-0 after:-bottom-1
                   after:h-0.5 after:w-0 after:bg-red-500
                   after:transition-all after:duration-300

                   hover:after:w-1/2
                   aria-[current=page]:after:w-1/2">
                        Manage Profiles
                    </x-nav-link>

                    <!-- Manage QR -->
                    @if(auth()->check() && auth()->user()->user_role === 'admin')
                        <x-nav-link
                            :href="route('qr.list')"
                            :active="request()->routeIs('qr.*')"
                            class="relative inline-flex items-center px-1 text-md font-semibold
                       text-gray-50
                       border-b-0 border-transparent
                       transition-colors duration-300
                       hover:text-red-400

                       after:absolute after:left-0 after:-bottom-1
                       after:h-0.5 after:w-0 after:bg-red-500
                       after:transition-all after:duration-300

                       hover:after:w-1/2
                       aria-[current=page]:after:w-1/2">
                            Manage QR
                        </x-nav-link>
                    @endif

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="group gap-2 inline-flex items-center px-3 py-2 border border-gray-700 text-sm leading-4 font-medium
                                   rounded-full bg-gray-900 text-gray-100 shadow-sm
                                   hover:border-red-500 hover:bg-red-600 hover:text-white focus:outline-none
                                   focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-black
                                   transition-all duration-300"
                        >
                            <i class="fa-solid fa-circle-user text-2xl text-red-400 group-hover:text-white transition-colors duration-300"></i>

                            <div class="flex flex-col items-start">
                                <span class="text-[10px] font-semibold tracking-wide uppercase text-gray-400 group-hover:text-gray-100 transition-colors duration-300">
                                    Logged in as
                                </span>
                                <span class="text-sm font-semibold">
                                    {{ Auth::user()->name }}
                                </span>
                            </div>

                            <svg class="ms-1 h-4 w-4 text-gray-400 group-hover:text-white transition-colors duration-300"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      fill="currentColor"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('My Account') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-200
                           hover:text-white hover:bg-gray-800 focus:outline-none focus:ring-2
                           focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-black
                           transition-all duration-300"
                >
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                              class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-gray-800 bg-black">
        <div class="px-4 pt-3 pb-2 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('profiles.index')" :active="request()->routeIs('profiles.*')">
                {{ __('Manage Profiles') }}
            </x-responsive-nav-link>

            @if(auth()->check() && auth()->user()->user_role === 'admin')
                <x-responsive-nav-link :href="route('qr.list')" :active="request()->routeIs('qr.*')">
                    {{ __('Manage QR') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-3 pb-4 border-t border-gray-800 bg-gray-900">
            <div class="px-4">
                <div class="font-semibold text-base text-gray-100">{{ Auth::user()->name }}</div>
                <div class="font-medium text-xs text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1 px-4">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('My Account') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
