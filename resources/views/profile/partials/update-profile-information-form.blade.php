<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Pengguna') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Perbarui informasi profil dan alamat email akun Anda.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nik" :value="__('NIK')" />
            <x-text-input id="nik" name="nik" type="text" class="block w-full mt-1" :value="old('nik', $user->nik)"
                required autofocus autocomplete="nik" />
            <x-input-error class="mt-2" :messages="$errors->get('nik')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="born_place" :value="__('Tempat Lahir')" />
            <x-text-input id="born_place" name="born_place" type="text" class="block w-full mt-1" :value="old('born_place', $user->born_place)"
                required autofocus autocomplete="born_place" />
            <x-input-error class="mt-2" :messages="$errors->get('born_place')" />
        </div>

        <div>
            <x-input-label for="born_date" :value="__('Tanggal Lahir')" />
            <x-text-input id="born_date" name="born_date" type="date" class="block w-full mt-1" :value="old('born_date', $user->born_date)"
                required autofocus autocomplete="born_date" />
            <x-input-error class="mt-2" :messages="$errors->get('born_date')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('No Telp')" />
            <x-text-input id="phone" name="phone" type="text" class="block w-full mt-1" :value="old('phone', $user->phone)"
                required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Alamat')" />
            <x-text-input id="address" name="address" type="text" class="block w-full mt-1" :value="old('address', $user->address)"
                autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Jenis Kelamin')" />
            <select name="gender" class="block w-full mt-1" required>
                <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" {{ old('gender', $user->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                </option>
                <option value="Perempuan" {{ old('gender', $user->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                </option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
