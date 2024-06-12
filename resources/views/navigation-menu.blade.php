<nav x-data="{ open: false }" class="bg-black border-b border-gray-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-24">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex justify-items-end">
                    <a href="{{ route('home') }}">
                        <img src="/assets/logo.png" class="block h-24 w-24" alt="logo" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" class="text-xl text-gray-400 hover:text-teal-600" :class="request()->routeIs('home') ? 'text-teal-600 border-b-2 border-teal-600' : 'border-transparent'">
                        {{ __('Home') }}
                    </x-nav-link>

                    @auth
                        <!-- Products link -->
                        <x-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.*')" class="text-xl text-gray-400 hover:text-teal-600" :class="request()->routeIs('products.*') ? 'text-teal-600 border-b-2 border-teal-600' : 'border-transparent'">
                            {{ __('Products') }}
                        </x-nav-link>
                        <!-- Bookings link -->
                        <x-nav-link href="{{ route('Bookings.index') }}" :active="request()->routeIs('bookings.*')" class="text-xl text-gray-400 hover:text-teal-600" :class="request()->routeIs('bookings.*') ? 'text-teal-600 border-b-2 border-teal-600' : 'border-transparent'">
                            {{ __('Bookings') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('facilities.index') }}" :active="request()->routeIs('facilities.*')" class="text-xl text-gray-400 hover:text-teal-600" :class="request()->routeIs('facilities.*') ? 'text-teal-600 border-b-2 border-teal-600' : 'border-transparent'">
                            {{ __('Facilities') }}
                        </x-nav-link>
                        <!-- Suppliers link -->
                        <x-nav-link href="{{ route('suppliers.index') }}" :active="request()->routeIs('suppliers.*')" class="text-xl text-gray-400 hover:text-teal-600" :class="request()->routeIs('suppliers.*') ? 'text-teal-600 border-b-2 border-teal-600' : 'border-transparent'">
                            {{ __('Suppliers') }}
                        </x-nav-link>
                        <!-- Customers link -->
                        <x-nav-link href="{{ route('customers.index') }}" :active="request()->routeIs('customers.*')" class="text-xl text-gray-400 hover:text-teal-600" :class="request()->routeIs('customers.*') ? 'text-teal-600 border-b-2 border-teal-600' : 'border-transparent'">
                            {{ __('Customers') }}
                        </x-nav-link>
                        <!-- Dashboard link -->
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-xl text-gray-400 hover:text-teal-600" :class="request()->routeIs('dashboard') ? 'text-teal-600 border-b-2 border-teal-600' : 'border-transparent'">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Login and Register Buttons -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="ms-3">
                    <a href="{{ route('login') }}" class="text-xl text-gray-500 hover:text-teal-600">Log In</a>
                    <span class="text-gray-400 mx-1">|</span>
                    <a href="{{ route('register') }}" class="text-xl text-gray-500 hover:text-teal-600">Register</a>
                </div>
            </div>

            @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <!-- Teams Dropdown -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="ms-3 relative">
                            <x-dropdown align="right" width="60">
                                <!-- Dropdown Trigger -->
                                <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-xl leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->currentTeam->name }}

                                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        </button>
                                    </span>
                                </x-slot>

                                <!-- Dropdown Content -->
                                <x-slot name="content">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endif

                    <!-- Settings Dropdown -->
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="48">
                            <!-- Dropdown Trigger -->
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->getFirstMediaUrl('profile_photo') }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-xl leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <!-- Dropdown Content -->
                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            @endauth
        </div>
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

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" class="text-xl text-gray-400 hover:text-teal-600" :class="request()->routeIs('home') ? 'text-teal-600 border-b-2 border-teal-600' : 'border-transparent'">
                {{ __('Home') }}
            </x-responsive-nav-link>

            <!-- Products link -->
            <x-responsive-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.*')" class="text-xl text-gray-400 hover:text-teal-600" :class="request()->routeIs('products.*') ? 'text-teal-600 border-b-2 border-teal-600' : 'border-transparent'">
                {{ __('Products') }}
            </x-responsive-nav-link>

            <!-- Bookings link -->
            <x-responsive-nav-link href="{{ route('Bookings.index') }}" :active="request()->routeIs('bookings.*')" class="text-xl text-gray-400 hover:text-teal-600" :class="request()->routeIs('bookings.*') ? 'text-teal-600 border-b-2 border-teal-600' : 'border-transparent'">
                {{ __('Bookings') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('facilities.index') }}" :active="request()->routeIs('facilities.*')" class="text-xl text-gray-400 hover:text-teal-600" :class="request()->routeIs('facilities.*') ? 'text-teal-600 border-b-2 border-teal-600' : 'border-transparent'">
                {{ __('Facilities') }}
            </x-responsive-nav-link>
            <!-- Suppliers link -->
            <x-responsive-nav-link href="{{ route('suppliers.index') }}" :active="request()->routeIs('suppliers.*')" class="text-xl text-gray-400 hover:text-teal-600" :class="request()->routeIs('suppliers.*') ? 'text-teal-600 border-b-2 border-teal-600' : 'border-transparent'">
                {{ __('Suppliers') }}
            </x-responsive-nav-link>
            <!-- Customers link -->
            <x-responsive-nav-link href="{{ route('customers.index') }}" :active="request()->routeIs('customers.*')" class="text-xl text-gray-400 hover:text-teal-600" :class="request()->routeIs('customers.*') ? 'text-teal-600 border-b-2 border-teal-600' : 'border-transparent'">
                {{ __('Customers') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
