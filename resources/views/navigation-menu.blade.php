<nav x-data="{ open: false }" class="border-b border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <x-dark-mode-button />

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                @can('user.index')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('user.index') }}" :active="request()->routeIs('user.*')">
                            Usuarios
                        </x-nav-link>
                    </div>
                @endcan

                @can('work.index')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('work.index') }}" :active="request()->routeIs('work.index')">
                            Solicitudes
                        </x-nav-link>
                    </div>
                @endcan


                @can('work.myworks')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('work.myworks') }}" :active="request()->routeIs('work.myworks')">
                            Mis solicitudes
                        </x-nav-link>
                    </div>
                @endcan

                @can('work.assigned')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('work.assigned-index') }}" :active="request()->routeIs('work.assigned-index')">
                            Asignadas
                        </x-nav-link>
                    </div>
                @endcan


            </div>

            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <!-- Settings Dropdown -->
                <div class="relative ml-3">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex rounded-full border-2 border-transparent text-sm transition focus:border-gray-300 focus:outline-none">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:bg-gray-50 focus:outline-none active:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 dark:focus:bg-gray-700 dark:active:bg-gray-700">
                                        {{ Auth::user()->name }}

                                        <svg class="-mr-0.5 ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('user.show', Auth::user()->id) }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                Administrar cuenta
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

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

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="space-y-1 pb-3 pt-2">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        @can('user.index')
            <div class="space-y-1 pb-3 pt-2">
                <x-responsive-nav-link href="{{ route('user.index') }}" :active="request()->routeIs('user.*')">
                    Usuarios
                </x-responsive-nav-link>
            </div>
        @endcan

        @can('work.index')
            <div class="space-y-1 pb-3 pt-2">
                <x-responsive-nav-link href="{{ route('work.index') }}" :active="request()->routeIs('work.index')">
                    Solicitudes
                </x-responsive-nav-link>
            </div>
        @endcan

        @can('work.myworks')
            <div class="space-y-1 pb-3 pt-2">
                <x-responsive-nav-link href="{{ route('work.myworks') }}" :active="request()->routeIs('work.myworks')">
                    Mis solicitudes
                </x-responsive-nav-link>
            </div>
        @endcan

        @can('work.assigned')
            <div class="space-y-1 pb-3 pt-2">
                <x-responsive-nav-link href="{{ route('work.assigned-index') }}" :active="request()->routeIs('work.assigned-index')">
                    Asignadas
                </x-responsive-nav-link>
            </div>
        @endcan

        <!-- Responsive Settings Options -->
        <div class="border-t border-gray-200 pb-1 pt-4 dark:border-gray-600">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="mr-3 shrink-0">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="{{ route('user.show', Auth::user()->id) }}" :active="request()->routeIs('user.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    Administrar cuenta
                </x-responsive-nav-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
