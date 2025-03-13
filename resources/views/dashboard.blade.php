<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col gap-5 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div id="dashboard-card" class="flex flex-row w-full overflow-hidden md:gap-8 max-sm:gap-2 max-sm:p-2">
                <div class="dashboard-card">
                    <div class="dashboard-card-content">
                        <span class="text-sm text-gray-600">Lansia</span>
                        <h1 class="text-3xl font-extrabold">34</h1>
                    </div>
                    <x-image src="{{ asset('assets/images/icons/lansia.png') }}" alt="lansia-logo"
                        class="w-20 ml-auto max-sm:hidden" />

                </div>
                <div class="dashboard-card">
                    <div class="dashboard-card-content">
                        <span class="text-sm text-gray-600">Cek Kesehatan</span>
                        <h1 class="text-3xl font-extrabold">67</h1>
                    </div>
                    <x-image src="{{ asset('assets/images/icons/check.png') }}" alt="cek_kesehatan-logo"
                        class="w-20 ml-auto max-sm:hidden" />
                </div>
                <div class="dashboard-card">
                    <div class="dashboard-card-content">
                        <span class="text-sm text-gray-600">Gizi</span>
                        <h1 class="text-3xl font-extrabold">250</h1>
                    </div>
                    <x-image src="{{ asset('assets/images/icons/gizi.png') }}" alt="gizi-logo"
                        class="w-20 ml-auto max-sm:hidden" />
                </div>
            </div>
            <div id="dashboard-grafik" class="max-w-full p-5 bg-white rounded-sm shadow-sm">
                ini untuk grafik
                <div class="w-96">
                    <canvas id="lansiaChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </div>
</x-app-layout>
