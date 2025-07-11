<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    @if (Auth::user()->role == 'dokter')
                        <a href="{{ route('dokter.dashboard') }}">
                            <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
                        </a>
                    @elseif(Auth::user()->role == 'pasien')
                        <a href="{{ route('pasien.dashboard') }}">
                            <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
                        </a>
                    @endif
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if (Auth::user()->role == 'dokter')
                        <x-nav-link :href="route('dokter.dashboard')" :active="request()->routeIs('dokter.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('dokter.jadwal-periksa.index')" :active="request()->routeIs('dokter.jadwal-periksa.index')">
                            {{ __('Jadwal Periksa') }}
                        </x-nav-link>
                        <x-nav-link :href="route('dokter.memeriksa.index')" :active="request()->routeIs('dokter.memeriksa.index')">
                            {{ __('Memeriksa') }}
                        </x-nav-link>
                        <x-nav-link :href="route('dokter.obat.index')" :active="request()->routeIs('dokter.obat.index')">
                            {{ __('Obat') }}
                        </x-nav-link>
                        {{-- <x-nav-link :href="route('dokter.pasien')" :active="request()->routeIs('dokter.pasien')">
                            {{ __('Daftar Pasien') }}
                        </x-nav-link> --}}
                    @elseif(Auth::user()->role == 'pasien')
                        <x-nav-link :href="route('pasien.dashboard')" :active="request()->routeIs('pasien.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <!-- Link khusus pasien -->
                        <x-nav-link :href="route('pasien.janji-periksa.index')" :active="request()->routeIs('pasien.janji-periksa.index')">
                            {{ __('Janji Periksa') }}
                        </x-nav-link>
                         {{-- <x-nav-link :href="route('pasien.memeriksa.index')" :active="request()->routeIs('pasien.riwayat-periksa.index')">
                            {{ __('Memeriksa') }}
                        </x-nav-link> --}}
                        <x-nav-link :href="route('pasien.riwayat-periksa.index')" :active="request()->routeIs('pasien.riwayat-periksa.index')">
                            {{ __('Riwayat Periksa') }}
                        </x-nav-link>
                        {{-- <x-nav-link :href="route('pasien.riwayat')" :active="request()->routeIs('pasien.riwayat')">
                            {{ __('Riwayat Pemeriksaan') }}
                        </x-nav-link> --}}
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->nama }}</div>

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
                        @if (Auth::user()->role == 'dokter')
                            <x-dropdown-link :href="route('dokter.profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        {{-- @elseif(Auth::user()->role == 'pasien')
                            <x-dropdown-link :href="route('pasien.profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        @else
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link> --}}
                        @endif

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

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
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
        <div class="pt-2 pb-3 space-y-1">
            @if (Auth::user()->role == 'dokter')
                <x-responsive-nav-link :href="route('dokter.dashboard')" :active="request()->routeIs('dokter.dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dokter.jadwal-periksa.index')" :active="request()->routeIs('dokter.jadwal-periksa.index')">
                    {{ __('Jadwal Periksa') }}
                </x-responsive-nav-link>
                {{-- <x-responsive-nav-link :href="route('dokter.jadwal')" :active="request()->routeIs('dokter.jadwal')">
                    {{ __('Jadwal Periksa') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dokter.pasien')" :active="request()->routeIs('dokter.pasien')">
                    {{ __('Daftar Pasien') }}
                </x-responsive-nav-link> --}}
            @elseif(Auth::user()->role == 'pasien')
                <x-responsive-nav-link :href="route('pasien.dashboard')" :active="request()->routeIs('pasien.dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pasien.janji-periksa.index')" :active="request()->routeIs('pasien.janji-periksa.index')">
                    {{ __('Janji Periksa') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pasien.riwayat-periksa.index')" :active="request()->routeIs('pasien.riwayat-periksa.index')">
                    {{ __('Riwayat Periksa') }}
                </x-responsive-nav-link>
                {{-- <x-responsive-nav-link :href="route('pasien.riwayat')" :active="request()->routeIs('pasien.riwayat')">
                    {{ __('Riwayat Pemeriksaan') }}
                </x-responsive-nav-link> --}}
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->nama }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                @if (Auth::user()->role == 'dokter')
                    <x-responsive-nav-link :href="route('dokter.profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                {{-- @elseif(Auth::user()->role == 'pasien')
                    <x-responsive-nav-link :href="route('pasien.profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link> --}}
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
