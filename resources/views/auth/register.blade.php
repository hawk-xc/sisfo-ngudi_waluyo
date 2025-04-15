<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" placeholder="Masukkan Nama" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- NIK -->
        <div class="mt-4">
            <x-input-label for="nik" :value="__('NIK')" />
            <x-text-input id="nik" class="block w-full mt-1" type="text" name="nik" :value="old('nik')"
                required autofocus autocomplete="nik" placeholder="Masukkan NIK" />
            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
        </div>

        <!-- No Telp -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('No Telp')" />
            <x-text-input id="phone" class="block w-full mt-1" type="text" name="phone" :value="old('phone')"
                required autofocus autocomplete="phone" placeholder="Masukkan No telepon" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                required autocomplete="username" placeholder="Masukkan Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Kata sandi')" />

            <div class="relative">
                <x-text-input id="password" class="block w-full pl-4 pr-10 mt-1" type="password" name="password"
                    required autocomplete="new-password" placeholder="Masukkan kata sandi" />
                <button type="button"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 mt-1 text-gray-500 transition-colors hover:text-gray-700 focus:outline-none"
                    onclick="togglePassword('password')">
                    <i class="text-lg ri-eye-line"></i>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata sandi')" />

            <div class="relative">
                <x-text-input id="password_confirmation" class="block w-full pl-4 pr-10 mt-1" type="password"
                    name="password_confirmation" required autocomplete="new-password"
                    placeholder="Konfirmasi kata sandi" />
                <button type="button"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 mt-1 text-gray-500 transition-colors hover:text-gray-700 focus:outline-none"
                    onclick="togglePassword('password_confirmation')">
                    <i class="text-lg ri-eye-line"></i>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Sudah punya akun? Login disini!') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrasi') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const button = passwordField.nextElementSibling;
            const icon = button.querySelector('i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('ri-eye-line');
                icon.classList.add('ri-eye-off-line');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('ri-eye-off-line');
                icon.classList.add('ri-eye-line');
            }
        }
    </script>
</x-guest-layout>
