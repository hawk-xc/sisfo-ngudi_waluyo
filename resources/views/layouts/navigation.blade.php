<div x-data="{ sidebarOpen: true }" class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <div :class="sidebarOpen ? 'w-64' : 'w-0'"
        class="z-50 overflow-hidden transition-all duration-300 ease-in-out bg-white shadow-lg">
        <div class="flex items-center justify-between px-4 py-[14px] border-b">
            <span class="text-lg font-bold text-gray-700" x-show="sidebarOpen">Menu</span>
            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-gray-700">
                <i class="text-2xl ri-arrow-left-s-line" x-show="sidebarOpen"></i>
                <i class="text-2xl ri-menu-line" x-show="!sidebarOpen"></i>
            </button>
        </div>

        <ul class="fixed w-64 min-h-full p-4 space-y-2 menu bg-base-100 text-base-content" x-show="sidebarOpen">
            <li class="{{ request()->routeIs('dashboard') ? 'bg-blue-200' : '' }} rounded-md"><a
                    href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'font-semibold' : '' }}"><i class="ri-home-2-line"></i>
                    Halaman
                    Utama</a></li>
            <li class="{{ request()->routeIs('lansia.*') ? 'bg-blue-200' : '' }} rounded-md">
                <a class="{{ request()->routeIs('lansia') ? 'font-semibold' : '' }}"
                    href="{{ route('lansia.index') }}"><i class="ri-group-line"></i> Data Lansia</a>
            </li>

            @role('admin')
                <li class="{{ request()->routeIs('kader.*') ? 'bg-blue-200' : '' }} rounded-md">
                    <a class="{{ request()->routeIs('kader') ? 'font-semibold' : '' }}" href="{{ route('kader.index') }}"><i
                            class="ri-shield-user-line"></i> Data Kader</a>
                </li>
            @endrole

            @role('kader|admin')
                <li class="{{ request()->routeIs('pj.*') ? 'bg-blue-200' : '' }} rounded-md">
                    <a class="{{ request()->routeIs('pj') ? 'font-semibold' : '' }}" href="{{ route('pj.index') }}"><i
                            class="ri-user-settings-line"></i> Penanggung Jawab</a>
                </li>
            @endrole

            <li class="{{ request()->routeIs('pemeriksaan.*') ? 'bg-blue-200' : '' }} rounded-md">
                <a class="{{ request()->routeIs('pemeriksaan') ? 'font-semibold' : '' }}"
                    href="{{ route('pemeriksaan.index') }}"><i class="ri-stethoscope-line"></i> Pemeriksaan</a>
            </li>

            @role('kader|admin')
                <li class="{{ request()->routeIs('laporan.*') ? 'bg-blue-200' : '' }} rounded-md">
                    <a class="{{ request()->routeIs('laporan') ? 'font-semibold' : '' }}"
                        href="{{ route('laporan.index') }}"><i class="ri-file-chart-line"></i> Laporan</a>
                </li>
            @endrole

            <li class="pt-4 border-t"><a
                    class="{{ request()->routeIs('profile.*') ? 'font-semibold bg-blue-200 font-semibold' : '' }} rounded-md"
                    href="{{ route('profile.edit') }}"><i class="ri-user-line"></i> Profil</a>
            </li>
            <form method="POST" action="{{ route('logout') }}">
                <li>
                    @csrf
                    <button type="submit" class="w-full text-left"><i class="ri-logout-box-line"></i> Keluar</button>
                </li>
            </form>
        </ul>
    </div>

    <!-- Main content -->
    <div class="relative flex flex-col flex-1">
        <!-- Topbar -->
        <header class="flex items-center justify-between px-4 py-4 bg-white shadow">
            <div class="flex items-center">
                <button @click="sidebarOpen = !sidebarOpen"
                    class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <i class="text-2xl" :class="sidebarOpen ? 'hidden' : 'ri-menu-line'"></i>
                </button>
                <span class="ml-2 text-xl font-bold">
                    <span class="flex flex-row items-center justify-center gap-2">
                        <x-application-logo class="block w-6 h-auto text-gray-800 fill-current" />

                        Poslansia Ngudi Waluyo Banjarsari :
                        @if (request()->routeIs('dashboard'))
                            {{ __('Halaman Utama') }}
                        @endif

                        @if (request()->routeIs('lansia.*'))
                            {{ __('Halaman Data Lansia') }}
                        @endif

                        @if (request()->routeIs('pemeriksaan.*'))
                            {{ __('Halaman Pemeriksaan') }}
                        @endif

                        @if (request()->routeIs('laporan.*'))
                            {{ __('Halaman Pelaporan') }}
                        @endif

                        @if (request()->routeIs('kader.*'))
                            {{ __('Halaman Data Kader') }}
                        @endif

                        @if (request()->routeIs('pj.*'))
                            {{ __('Halaman Penanggung Jawab') }}
                        @endif

                        @if (request()->routeIs('profile.*'))
                            {{ __('Halaman Profil') }}
                        @endif
                    </span>
                </span>
            </div>
            <div class="text-gray-600">
                {{ Auth::user()->name }}
            </div>
        </header>
        <!-- Page Content -->
        <main class="p-2">
            {{ $slot }}
        </main>
        {{-- Footer --}}
        <footer class="absolute bottom-0 flex items-end justify-end w-full px-4 py-4 bg-white shadow text-end">
            <div class="text-sm text-gray-600">
                &copy; {{ date('Y') }} Poslansia Ngudi Waluyo Banjarsari. All rights reserved.
            </div>
        </footer>
    </div>
</div>
