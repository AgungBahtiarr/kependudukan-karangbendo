@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Data Warga</h1>

        <div class="my-4">
            <ol
                class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        Informasi <span class="hidden sm:inline-flex sm:ms-2">Personal</span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        Alamat <span class="hidden sm:inline-flex sm:ms-2"></span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <span class="me-2">3</span>
                        Dawis <span class="hidden sm:inline-flex sm:ms-2"></span>
                    </span>
                </li>
                <li class="flex items-center">
                    <span class="me-2">4</span>
                    Kegiatan
                </li>
            </ol>

        </div>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <h1 class="mb-4 font-semibold">Informasi Alamat</h1>

            <form action="{{ route('wargas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" name="alamat_prov" class="form-control" required value="Jawa Timur">
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kabupaten</label>
                    <input type="text" name="alamat_kab" class="form-control" required value="Banyuwangi">
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kecamatan</label>
                    <input type="text" name="alamat_kec" class="form-control" required value="Rogojampi">
                </div>
                <div class="form-group">
                    <label for="desa kel">Desa/Kelurahan</label>
                    <input type="text" name="alamat_desakel" class="form-control" required value="Karangbendo">
                </div>

                <div class="form-group">
                    <label for="alamat_dusun">Alamat Dusun</label>
                    <select name="alamat_dusun" id="alamat_dusun" class="form-control" required>
                        <option value="" disabled selected>Pilih Dusun</option>
                        @foreach ($dusun_data as $dusun => $data)
                            <option value="{{ $dusun }}"
                                {{ $wargaSession && $wargaSession['alamat_dusun'] == $dusun ? 'selected' : '' }}>
                                {{ $dusun }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <select name="rw" id="rw" class="form-control" required>
                            <option value="" disabled selected>Pilih RW</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <select name="rt" id="rt" class="form-control" required>
                            <option value="" disabled selected>Pilih RT</option>
                        </select>
                    </div>
                </div>

                <script>
                    var dusunData = @json($dusun_data);
                    var selectedDusun = "{{ $wargaSession['alamat_dusun'] ?? '' }}";
                    var selectedRW = "{{ $wargaSession['rw'] ?? '' }}";
                    var selectedRT = "{{ $wargaSession['rt'] ?? '' }}";

                    function updateRWOptions() {
                        var dusun = document.getElementById('alamat_dusun').value;
                        var rwSelect = document.getElementById('rw');
                        rwSelect.innerHTML = '<option value="">Pilih RW</option>';
                        if (dusun && dusunData[dusun]) {
                            Object.keys(dusunData[dusun].rw_rt).forEach(function(rw) {
                                var option = document.createElement('option');
                                option.value = rw;
                                option.textContent = rw;
                                option.selected = (rw === selectedRW);
                                rwSelect.appendChild(option);
                            });
                        }
                        updateRTOptions();
                    }

                    function updateRTOptions() {
                        var dusun = document.getElementById('alamat_dusun').value;
                        var rw = document.getElementById('rw').value;
                        var rtSelect = document.getElementById('rt');
                        rtSelect.innerHTML = '<option value="">Pilih RT</option>';
                        if (dusun && rw && dusunData[dusun] && dusunData[dusun].rw_rt[rw]) {
                            dusunData[dusun].rw_rt[rw].forEach(function(rt) {
                                var option = document.createElement('option');
                                option.value = rt;
                                option.textContent = rt;
                                option.selected = (rt === selectedRT);
                                rtSelect.appendChild(option);
                            });
                        }
                    }

                    document.getElementById('alamat_dusun').addEventListener('change', function() {
                        selectedRW = '';
                        selectedRT = '';
                        updateRWOptions();
                    });

                    document.getElementById('rw').addEventListener('change', function() {
                        selectedRT = '';
                        updateRTOptions();
                    });

                    // Initialize options on page load
                    if (selectedDusun) {
                        document.getElementById('alamat_dusun').value = selectedDusun;
                        updateRWOptions();
                        if (selectedRW) {
                            document.getElementById('rw').value = selectedRW;
                            updateRTOptions();
                        }
                    }

                    // Call updateRWOptions on page load to populate RW dropdown
                    updateRWOptions();
                </script>


                <div class="form-group">
                    <label for="alamat_jalan">Alamat Jalan</label>
                    <input type="text" name="alamat_jalan" class="form-control" required
                        value={{ $wargaSession ? $wargaSession['alamat_jalan'] : '' }}>
                </div>

                <div class="form-group">
                    <label for="domisili_sesuai_ktp">Domisili Sesuai KTP</label>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input hx-trigger="click" hx-post="/warga/isDomisili/1" hx-swap="innerHtml"
                                hx-target="#domisili" type="radio" id="kb_ya" name="domisili_sesuai_ktp"
                                value="1" class="custom-control-input" required
                                {{ $wargaSession && $wargaSession['domisili_sesuai_ktp'] == '1' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="kb_ya"> Ya </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input hx-trigger="click" hx-post="/warga/isDomisili/0" hx-swap="innerHtml"
                                hx-target="#domisili" type="radio" id="kb_tidak" name="domisili_sesuai_ktp"
                                value="0" class="custom-control-input" required
                                {{ $wargaSession && $wargaSession['domisili_sesuai_ktp'] == '0' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="kb_tidak"> Tidak </label>
                        </div>
                    </div>
                </div>

                @if ($wargaSession && $wargaSession['alamat_domisili'])
                    <div id="domisili">
                        <div class="form-group">
                            <label for="alamat_domisili">Alamat Domisili</label>
                            <input type="text" name="alamat_domisili" class="form-control" required
                                value={{ $wargaSession['alamat_domisili'] }}>
                        </div>
                    </div>
                @else
                    <div id="domisili"></div>
                @endif
                <div class="modal-footer">
                    <a hx-post={{ route('wargas.back') }} hx-trigger="click" type="button"
                        class="btn btn-secondary text-white">Kembali</a>
                    {{-- <a href="/warga/create/1">back</a> --}}
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
