<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Kata Sandi') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="update_password_current_password" :value="__('Kata sandi')" />

            <div class="relative">
                <x-text-input id="update_password_current_password" class="block w-full pl-4 pr-10 mt-1" type="password"
                    name="current_password" required autocomplete="current-password" />
                <button type="button"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 mt-1 text-gray-500 transition-colors hover:text-gray-700 focus:outline-none"
                    onclick="togglePassword('update_password_current_password')">
                    <i class="text-lg ri-eye-line"></i>
                </button>
            </div>

            <x-input-error :messages="$errors->get('current-password')" class="mt-2" />
        </div>

        <!-- New Password -->
        <div class="mt-4">
            <x-input-label for="update_password_password" :value="__('Kata sandi baru')" />

            <div class="relative">
                <x-text-input id="update_password_password" class="block w-full pl-4 pr-10 mt-1" type="password"
                    name="password" required autocomplete="new-password" />
                <button type="button"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 mt-1 text-gray-500 transition-colors hover:text-gray-700 focus:outline-none"
                    onclick="togglePassword('update_password_password')">
                    <i class="text-lg ri-eye-line"></i>
                </button>
            </div>

            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- Confirmation New Password -->
        <div class="mt-4">
            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata sandi baru')" />

            <div class="relative">
                <x-text-input id="update_password_password_confirmation" class="block w-full pl-4 pr-10 mt-1"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
                <button type="button"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 mt-1 text-gray-500 transition-colors hover:text-gray-700 focus:outline-none"
                    onclick="togglePassword('update_password_password_confirmation')">
                    <i class="text-lg ri-eye-line"></i>
                </button>
            </div>

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('tersimpan.') }}</p>
            @endif
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
</section>
