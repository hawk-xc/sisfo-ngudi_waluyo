<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah Data Pemeriksaan') }}
        </h2>
    </x-slot>

    <div class="py-12 mb-10">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <div class="flex justify-end w-full">
                            <a href="{{ route('pemeriksaan.index') }}" class="btn btn-outline btn-neutral btn-sm">
                                <i class="ri-arrow-left-long-line"></i>
                                Kembali ke halaman Pemeriksaan
                            </a>
                        </div>
                        @if ($errors->any())
                            <div class="w-full px-5 py-2 mt-5 text-white bg-red-400 rounded-md">
                                <h2 class="text-xl font-extrabold"><i class="ri-error-warning-line"></i> Terdapat error
                                    Validasi!</h2>
                                <ul class="text-white list-disc list-inside mx-7">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('pemeriksaan.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="flex flex-col w-full gap-5 p-5 md:flex-row">
                                <div id="form" class="flex flex-col flex-1 gap-3">
                                    <div class="flex flex-col w-full gap-2 p-2">
                                        <label for="imt">IMT (Index Masa Tumbuh)</label>
                                        <fieldset class="fieldset">
                                            <label class="w-full input">
                                                kg/m²
                                                <input type="number" placeholder="IMT Lansia, ex. 70" step="0.1"
                                                    class="grow w-full input {{ $errors->has('imt') ? 'input-error' : '' }}"
                                                    value="{{ old('imt') }}" name="imt" readonly />
                                            </label>
                                            @if ($errors->first('imt'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('imt') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>

                                    <div class="flex w-full md:gap-3 md:flex-row max-sm:flex-col">
                                        <div class="flex flex-col w-full gap-2 p-2">
                                            <label for="berat_badan">Berat Badan Lansia</label>
                                            <fieldset class="fieldset">
                                                <label class="w-full input">
                                                    Kg
                                                    <input type="number" placeholder="Berat Badan Lansia, ex. 45"
                                                        step="0.1"
                                                        class="grow w-full input {{ $errors->has('berat_badan') ? 'input-error' : '' }}"
                                                        value="{{ old('berat_badan') }}" name="berat_badan" />
                                                </label>
                                                @if ($errors->first('berat_badan'))
                                                    <p class="fieldset-label text-error">
                                                        {{ $errors->first('berat_badan') }}</p>
                                                @endif
                                            </fieldset>
                                        </div>

                                        {{-- tinggi_lansia --}}
                                        <div class="flex flex-col w-full gap-2 p-2">
                                            <label for="tinggi_badan">Tinggi Badan Lansia</label>
                                            <fieldset class="fieldset">
                                                <label class="w-full input">
                                                    Cm
                                                    <input type="number" placeholder="Tinggi Badan Lansia, ex. 170"
                                                        step="0.1"
                                                        class="grow w-full input {{ $errors->has('tinggi_badan') ? 'input-error' : '' }}"
                                                        value="{{ old('tinggi_badan') }}" name="tinggi_badan" />
                                                </label>
                                                @if ($errors->first('tinggi_badan'))
                                                    <p class="fieldset-label text-error">
                                                        {{ $errors->first('tinggi_badan') }}</p>
                                                @endif
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="flex w-full md:gap-3 md:flex-row max-sm:flex-col">
                                        {{-- tensi_sistolik --}}
                                        <div class="flex flex-col gap-2 p-2">
                                            <label for="tensi_sistolik">Tensi Sistolik</label>
                                            <fieldset class="fieldset">
                                                <label class="w-full input">
                                                    mmHg
                                                    <input type="number" placeholder="Tensi Sistolik, ex. 130"
                                                        step="0.1"
                                                        class="grow w-full input {{ $errors->has('tensi_sistolik') ? 'input-error' : '' }}"
                                                        value="{{ old('tensi_sistolik') }}" name="tensi_sistolik" />
                                                </label>
                                                @if ($errors->first('tensi_sistolik'))
                                                    <p class="fieldset-label text-error">
                                                        {{ $errors->first('tensi_sistolik') }}</p>
                                                @endif
                                            </fieldset>
                                        </div>

                                        {{-- tensi_diastolik --}}
                                        <div class="flex flex-col gap-2 p-2 ">
                                            <label for="tensi_diastolik">Tensi Diastolik</label>
                                            <fieldset class="fieldset">
                                                <label class="w-full input">
                                                    mmHg
                                                    <input type="number" placeholder="Tensi Diastolik, ex. 110"
                                                        step="0.1"
                                                        class="grow w-full input {{ $errors->has('tensi_diastolik') ? 'input-error' : '' }}"
                                                        value="{{ old('tensi_diastolik') }}" name="tensi_diastolik" />
                                                </label>
                                                @if ($errors->first('tensi_diastolik'))
                                                    <p class="fieldset-label text-error">
                                                        {{ $errors->first('tensi_diastolik') }}</p>
                                                @endif
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="flex w-full md:gap-3 md:flex-row max-sm:flex-col">
                                        {{-- lingkar_perut --}}
                                        <div class="flex flex-col w-full gap-2 p-2">
                                            <label for="lingkar_perut">Lingkar Perut</label>
                                            <fieldset class="fieldset">
                                                <label class="w-full input">
                                                    Cm
                                                    <input type="number" placeholder="Lingkar Perut, ex. 40"
                                                        step="0.1"
                                                        class="grow w-full input {{ $errors->has('lingkar_perut') ? 'input-error' : '' }}"
                                                        value="{{ old('lingkar_perut') }}" name="lingkar_perut" />
                                                </label>
                                                @if ($errors->first('lingkar_perut'))
                                                    <p class="fieldset-label text-error">
                                                        {{ $errors->first('lingkar_perut') }}</p>
                                                @endif
                                            </fieldset>
                                        </div>

                                        {{-- gula_darah --}}
                                        <div class="flex flex-col w-full gap-2 p-2">
                                            <label for="gula_darah">Gula Darah</label>
                                            <fieldset class="fieldset">
                                                <label class="w-full input">
                                                    mg/dL
                                                    <input type="number" placeholder="Gula Darah, ex. 80"
                                                        step="0.1"
                                                        class="grow w-full input {{ $errors->has('gula_darah') ? 'input-error' : '' }}"
                                                        value="{{ old('gula_darah') }}" name="gula_darah" />
                                                </label>
                                                @if ($errors->first('gula_darah'))
                                                    <p class="fieldset-label text-error">
                                                        {{ $errors->first('gula_darah') }}</p>
                                                @endif
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="flex w-full md:gap-3 md:flex-row max-sm:flex-col">
                                        {{-- analisa_imt --}}
                                        <div class="flex flex-col w-full gap-2 p-2">
                                            <label for="analisis_imt">Analisa IMT</label>
                                            <select class="select select-success" name="analisis_imt">
                                                <option disabled selected>Pilih Analisa IMT</option>
                                                <option value="normal"
                                                    {{ old('analisis_imt') == 'normal' ? 'selected' : '' }}>Normal
                                                </option>
                                                <option value="kurus"
                                                    {{ old('analisis_imt') == 'kurus' ? 'selected' : '' }}>Kurus
                                                </option>
                                                <option value="gemuk"
                                                    {{ old('analisis_imt') == 'gemuk' ? 'selected' : '' }}>Gemuk
                                                </option>
                                                <option value="obesitas"
                                                    {{ old('analisis_imt') == 'obesitas' ? 'selected' : '' }}>Obesitas
                                                </option>
                                            </select>
                                        </div>

                                        {{-- analisa_tensi --}}
                                        <div class="flex flex-col w-full gap-2 p-2">
                                            <label for="analisis_tensi">Analisa Tensi</label>
                                            <select class="select select-success" name="analisis_tensi">
                                                <option disabled selected>Pilih Analisa Tensi</option>
                                                <option value="hipotensi"
                                                    {{ old('analisis_tensi') == 'hipotensi' ? 'selected' : '' }}>
                                                    Hipotensi (Rendah)</option>
                                                <option value="normal"
                                                    {{ old('analisis_tensi') == 'normal' ? 'selected' : '' }}>Normal
                                                </option>
                                                <option value="prehipertensi"
                                                    {{ old('analisis_tensi') == 'prehipertensi' ? 'selected' : '' }}>
                                                    Prehipertensi</option>
                                                <option value="hipertensi_stage1"
                                                    {{ old('analisis_tensi') == 'hipertensi_stage1' ? 'selected' : '' }}>
                                                    Hipertensi Stage 1</option>
                                                <option value="hipertensi_stage2"
                                                    {{ old('analisis_tensi') == 'hipertensi_stage2' ? 'selected' : '' }}>
                                                    Hipertensi Stage 2</option>
                                                <option value="krisis_hipertensi"
                                                    {{ old('analisis_tensi') == 'krisis_hipertensi' ? 'selected' : '' }}>
                                                    Krisis Hipertensi</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="flex w-full md:gap-3 md:flex-row max-sm:flex-col">
                                        {{-- analisa_kesehatan --}}
                                        <div class="flex flex-col w-full gap-2 p-2">
                                            <label for="analisis_kesehatan">Kondisi Kesehatan</label>
                                            <select class="select select-success" name="healthy_check">
                                                <option disabled selected>Pilih Kondisi Kesehatan</option>
                                                <option value="sehat"
                                                    {{ old('healthy_check') == 'sehat' ? 'selected' : '' }}>Sehat
                                                </option>
                                                <option value="flu"
                                                    {{ old('healthy_check') == 'flu' ? 'selected' : '' }}>Flu /
                                                    Demam Ringan</option>
                                                <option value="batuk_pilek"
                                                    {{ old('healthy_check') == 'batuk_pilek' ? 'selected' : '' }}>
                                                    Batuk / Pilek</option>
                                                <option value="cedera_ringan"
                                                    {{ old('healthy_check') == 'cedera_ringan' ? 'selected' : '' }}>
                                                    Cedera Ringan</option>
                                                <option value="kondisi_kronis"
                                                    {{ old('healthy_check') == 'kondisi_kronis' ? 'selected' : '' }}>
                                                    Kondisi Kronis (Asma/Diabetes)</option>
                                                <option value="perlu_pemeriksaan"
                                                    {{ old('healthy_check') == 'perlu_pemeriksaan' ? 'selected' : '' }}>
                                                    Perlu Pemeriksaan Lanjut</option>
                                            </select>
                                        </div>


                                        {{-- analisa_mental --}}
                                        <div class="flex flex-col w-full gap-2 p-2">
                                            <label for="analisis_mental">Kondisi Mental</label>
                                            <select class="select select-success" name="mentality_check">
                                                <option disabled selected>Pilih Kondisi Mental</option>
                                                <option value="sehat"
                                                    {{ old('mentality_check') == 'sehat' ? 'selected' : '' }}>Sehat
                                                    Mental</option>
                                                <option value="cemas_ringan"
                                                    {{ old('mentality_check') == 'cemas_ringan' ? 'selected' : '' }}>
                                                    Cemas Ringan</option>
                                                <option value="cemas_berat"
                                                    {{ old('mentality_check') == 'cemas_berat' ? 'selected' : '' }}>
                                                    Cemas Berat</option>
                                                <option value="depresi_ringan"
                                                    {{ old('mentality_check') == 'depresi_ringan' ? 'selected' : '' }}>
                                                    Depresi Ringan</option>
                                                <option value="depresi_berat"
                                                    {{ old('mentality_check') == 'depresi_berat' ? 'selected' : '' }}>
                                                    Depresi Berat</option>
                                                <option value="perlu_konsultasi"
                                                    {{ old('mentality_check') == 'perlu_konsultasi' ? 'selected' : '' }}>
                                                    Perlu Konsultasi Profesional</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-2 p-4 bg-orange-100">
                                        <div class="flex flex-row gap-2">
                                            <input type="checkbox" name="hospital_referral" id="hospital_referral"
                                                class="checkbox checkbox-primary checkbox-sm" />
                                            <label for="hospital_referral">Perlu Rujukan</label>
                                        </div>
                                        <span class="text-xs text-gray-600">
                                            Perlu rujukan ke Rumah Sakit apabila terdapat indikasi adanya kondisi
                                            kesehatan yang tidak stabil atau memerlukan pengawasan lebih lanjut.
                                        </span>
                                    </div>
                                </div>


                                <div id="lansia-select" class="flex flex-col flex-1 gap-3">
                                    <div class="flex flex-col gap-3 p-2">
                                        <label for="input_filter-lansia_id">Pilih Lansia</label>
                                        <select class="w-full select select-bordered" name="lansia_id"
                                            id="input_filter-lansia_id"></select>
                                        @if ($errors->first('lansia_id'))
                                            <p class="mt-1 text-sm text-error">
                                                {{ $errors->first('lansia_id') }}
                                            </p>
                                        @endif
                                    </div>

                                    {{-- tanggal_pemeriksaan --}}
                                    <div class="flex flex-col gap-2 p-2 mt-1">
                                        <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                                        <fieldset class="fieldset">
                                            <input type="date" name="tanggal_pemeriksaan"
                                                value="{{ old('tanggal_pemeriksaan') }}" id="tanggal_pemeriksaan"
                                                class="w-full input-success input {{ $errors->has('tanggal_pemeriksaan') ? 'input-error' : '' }}">
                                            @if ($errors->first('tanggal_pemeriksaan'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('tanggal_pemeriksaan') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>

                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="keterangan">Keterangan</label>
                                        <fieldset class="fieldset">
                                            <textarea name="keterangan"
                                                class="w-full textarea textarea-success {{ $errors->has('keterangan') ? 'textarea-error' : '' }}" id="keterangan"
                                                cols="30" rows="15" placeholder="Keterangan...">{{ old('keterangan') }}</textarea>
                                            @if ($errors->first('keterangan'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('keterangan') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end w-full gap-5 p-5">
                                <button id="resetButton" type="reset"
                                    class="text-red-500 cursor-pointer hover:text-red-600 hover:underline">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-outline btn-sm btn-primary">
                                    Simpan Kegiatan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Load jQuery dan Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />

    <style>
        /* Custom styling untuk Select2 di DaisyUI */
        .select2-container--bootstrap-5 .select2-selection {
            /* min-height: 4rem; */
            min-height: 40px;
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
            border: 1px solid #a5cdce;
            /* border: 1px solid hsl(var(--bc) / var(--tw-border-opacity)); */
            --tw-border-opacity: 0.2;
            border-radius: var(--rounded-btn, 0.5rem);
            background-color: hsl(var(--b1));
            font-size: 15px;
            color: hsl(var(--bc));
        }

        .select2-container--bootstrap-5 .select2-selection--single .select2-selection__rendered {
            padding-left: 0;
            color: hsl(var(--bc));
        }

        .select2-container--bootstrap-5 .select2-selection--single .select2-selection__arrow {
            height: 100%;
            right: 0.75rem;
        }

        .select2-container--bootstrap-5 .select2-dropdown {
            border: 1px solid hsl(var(--bc) / 0.2);
            border-radius: var(--rounded-btn, 0.5rem);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            /* background-color: hsl(var(--b1)); */
            background-color: white;
        }

        .select2-container--bootstrap-5 .select2-results__option {
            padding: 0.5rem 1rem;
            color: hsl(var(--bc));
        }

        .select2-container--bootstrap-5 .select2-results__option--highlighted {
            background-color: hsl(var(--p));
            color: hsl(var(--pc));
        }

        .select2-container--bootstrap-5 .select2-search--dropdown .select2-search__field {
            border: 1px solid hsl(var(--bc) / 0.2);
            border-radius: var(--rounded-btn, 0.5rem);
            background-color: hsl(var(--b1));
            color: hsl(var(--bc));
            padding: 0.375rem 0.75rem;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bbInput = document.querySelector('input[name="berat_badan"]');
            const tinggiInput = document.querySelector('input[name="tinggi_badan"]');
            const imtInput = document.querySelector('input[name="imt"]');

            // Fungsi untuk menghitung IMT
            function calculateIMT() {
                const berat = parseFloat(bbInput.value);
                const tinggiCm = parseFloat(tinggiInput.value);

                if (!isNaN(berat) && !isNaN(tinggiCm) && tinggiCm > 0) {
                    // Konversi tinggi dari cm ke meter
                    const tinggiM = tinggiCm / 100;
                    const imt = berat / (tinggiM * tinggiM);
                    imtInput.value = imt.toFixed(2); // Menampilkan 2 angka di belakang koma
                } else {
                    imtInput.value = '';
                }
            }

            // Tambahkan event listener yang lebih komprehensif
            bbInput.addEventListener('input', calculateIMT);
            bbInput.addEventListener('change', calculateIMT);
            bbInput.addEventListener('blur', calculateIMT);

            tinggiInput.addEventListener('input', calculateIMT);
            tinggiInput.addEventListener('change', calculateIMT);
            tinggiInput.addEventListener('blur', calculateIMT);

            // Hitung saat halaman dimuat jika ada nilai yang sudah terisi
            if (bbInput.value || tinggiInput.value) {
                calculateIMT();
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            // Simpan nilai lansia_id yang sudah ada
            var selectedLansiaId = "{{ old('lansia_id') }}";
            var selectedLansiaData = null;

            // Inisialisasi Select2
            $('#input_filter-lansia_id').select2({
                placeholder: 'Pilih Lansia atau ketik untuk mencari...',
                theme: 'bootstrap-5',
                allowClear: true,
                width: '100%',
                dropdownParent: $('#lansia-select'),
                ajax: {
                    url: "{{ route('lansia.select2') }}",
                    delay: 250,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            search: params.term,
                            page: params.page || 1
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;

                        return {
                            results: $.map(data.data, function(item) {
                                return {
                                    id: item.id,
                                    text: `${item.nama} (NIK: ${item.nik})`,
                                    nama: item.nama,
                                    nik: item.nik,
                                    umur: item.umur,
                                    alamat: item.alamat,
                                    pj_nama: item.pj_nama
                                };
                            }),
                            pagination: {
                                more: (params.page * 10) < (data.total || data.data.length)
                            }
                        };
                    },
                    cache: true
                },
                dropdownCssClass: "bigdrop",
                minimumInputLength: 0,
                templateResult: function(item) {
                    if (item.loading) return item.text;

                    if (!item.id) return item.text;

                    var $result = $(
                        '<div class="flex flex-col p-2">' +
                        '<span class="font-semibold font-xl">' + item.nama + '</span>' +
                        '<div class="flex flex-wrap gap-2 text-sm">' +
                        '<span>NIK: ' + (item.nik || '-') + '</span>' +
                        '<span>•</span>' +
                        '<span>Umur: ' + (item.umur || '-') + ' tahun</span>' +
                        '<span>•</span>' +
                        '<span>Alamat: ' + (item.alamat || '-') + '</span>' +
                        '</div>' +
                        '<div class="text-sm">Penanggung Jawab: ' + (item.pj_nama || '-') +
                        '</div>' +
                        '</div>'
                    );

                    return $result;
                },
                templateSelection: function(item) {
                    if (!item.id) return item.text;
                    // Gunakan data yang sudah disimpan jika tersedia
                    if (selectedLansiaData && item.id === selectedLansiaData.id) {
                        return selectedLansiaData.nama + ' (NIK: ' + selectedLansiaData.nik + ')';
                    }
                    // Fallback untuk data baru yang dipilih
                    return item.text;
                }
            });

            // Jika ada lansia_id yang sudah dipilih, load data tersebut
            if (selectedLansiaId) {
                // Buat AJAX request untuk mendapatkan detail lansia
                $.ajax({
                    url: "{{ route('lansia.select2') }}",
                    data: {
                        id: selectedLansiaId
                    },
                    dataType: 'json'
                }).done(function(data) {
                    if (data.data && data.data.length > 0) {
                        var lansia = data.data[0];

                        // Format data sesuai kebutuhan Select2
                        selectedLansiaData = {
                            id: lansia.id,
                            text: lansia.nama + ' (NIK: ' + lansia.nik + ')',
                            nama: lansia.nama,
                            nik: lansia.nik,
                            umur: lansia.umur,
                            alamat: lansia.alamat,
                            pj_nama: lansia.pj_nama
                        };

                        // Buat option baru dan tambahkan ke select
                        var option = new Option(
                            selectedLansiaData.text,
                            selectedLansiaData.id,
                            true,
                            true
                        );

                        $('#input_filter-lansia_id').append(option).trigger('change');

                        // Perbarui tampilan
                        $('#input_filter-lansia_id').trigger({
                            type: 'select2:select',
                            params: {
                                data: selectedLansiaData
                            }
                        });
                    }
                }).fail(function() {
                    console.error('Gagal memuat data lansia');
                });
            }

            // Fungsi untuk menangani ketika dropdown dibuka
            $('#input_filter-lansia_id').on('select2:open', function() {
                if ($('#input_filter-lansia_id').find('option').length <= 1) {
                    $('.select2-search__field').val('').trigger('input');
                }
            });

            // Reset form
            $('#resetButton').on('click', function() {
                $('#input_filter-lansia_id').val(null).trigger('change');
                selectedLansiaData = null;
            });

            // Handle ketika memilih item baru
            $('#input_filter-lansia_id').on('select2:select', function(e) {
                selectedLansiaData = e.params.data;
            });
        });
    </script>
</x-app-layout>
