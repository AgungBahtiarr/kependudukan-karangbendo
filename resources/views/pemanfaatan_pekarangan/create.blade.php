@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Data Pemanfaatan Pekarangan</h1>


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
                        Catatan <span class="hidden sm:inline-flex sm:ms-2">Keluarga</span>
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
                        Jumlah <span class="hidden sm:inline-flex sm:ms-2">Anggota</span>
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
                        Tanah <span class="hidden sm:inline-flex sm:ms-2">Pekarangan</span>
                    </span>
                </li>
                <li class="flex items-center">
                    <span class="me-2">4</span>
                    Industri <span class="hidden sm:inline-flex sm:ms-2">Keluarga</span>
                </li>
            </ol>
        </div>


        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('pekarangans.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id_carga" value={{ $carga->id }}>

                <div class="form-group">
                    <label for="nkk">No Kartu Keluarga</label>
                    <input type="number" min="16" max="16" name="nkk" value={{ $carga->nkk }}
                        @readonly(true) class="form-control" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <div class="form-group">
                            <label for="tanaman_keras">Tanaman Keras</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="tanaman_keras_ya" name="tanaman_keras" value="1"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="tanaman_keras_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="tanaman_keras_tidak" name="tanaman_keras" value="0"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="tanaman_keras_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div id="tanaman_keras_details" style="display: none;" class="flex flex-col">
                            <div class="form-group">
                                <label for="jenis_tanaman_keras">Jenis Tanaman Keras</label>
                                <select name="jenis_tanaman_keras" id="jenis_tanaman_keras" class="form-control" required>
                                    <option value="" disabled>Pilih Jenis Tanaman Keras</option>
                                    @foreach ($data_pekarangan['tanamanKeras'] as $tanaman)
                                        <option value="{{ $tanaman }}"
                                            {{ old('jenis_tanaman_keras') == $tanaman ? 'selected' : '' }}>
                                            {{ $tanaman }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="volume_tanaman_keras">Volume Tanaman Keras</label>
                                <input type="number" name="volume_tanaman_keras" id="volume_tanaman_keras"
                                    class="form-control" value="{{ old('volume_tanaman_keras') }}" required>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const tanamanKerasYa = document.getElementById('tanaman_keras_ya');
                            const tanamanKerasTidak = document.getElementById('tanaman_keras_tidak');
                            const tanamanKerasDetails = document.getElementById('tanaman_keras_details');
                            const jenisTanamanKeras = document.getElementById('jenis_tanaman_keras');
                            const volumeTanamanKeras = document.getElementById('volume_tanaman_keras');

                            function toggleTanamanKerasDetails() {
                                if (tanamanKerasYa.checked) {
                                    tanamanKerasDetails.style.display = 'block';
                                    jenisTanamanKeras.required = true;
                                    volumeTanamanKeras.required = true;
                                } else {
                                    tanamanKerasDetails.style.display = 'none';
                                    jenisTanamanKeras.required = false;
                                    volumeTanamanKeras.required = false;
                                    jenisTanamanKeras.value = '';
                                    volumeTanamanKeras.value = '';
                                }
                            }

                            tanamanKerasYa.addEventListener('change', toggleTanamanKerasDetails);
                            tanamanKerasTidak.addEventListener('change', toggleTanamanKerasDetails);

                            // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
                            toggleTanamanKerasDetails();
                        });
                    </script>


                    <div>
                        <div class="form-group">
                            <label for="toga">Toga</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="toga_ya" name="toga" value="1"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="toga_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="toga_tidak" name="toga" value="0"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="toga_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div id="toga_details" style="display: none;" class="flex flex-col">
                            <div class="form-group">
                                <label for="jenis_toga">Jenis Toga</label>
                                <select name="jenis_toga" id="jenis_toga" class="form-control" required>
                                    <option value="" disabled>Pilih Jenis Toga</option>
                                    @foreach ($data_pekarangan['toga'] as $toga)
                                        <option value="{{ $toga }}"
                                            {{ old('jenis_toga') == $toga ? 'selected' : '' }}>
                                            {{ $toga }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="volume_toga">Volume Toga</label>
                                <input type="number" name="volume_toga" id="volume_toga" class="form-control"
                                    value="{{ old('volume_toga') }}" required>
                            </div>
                        </div>
                    </div>


                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const togaYa = document.getElementById('toga_ya');
                            const togaTidak = document.getElementById('toga_tidak');
                            const togaDetails = document.getElementById('toga_details');
                            const jenisToga = document.getElementById('jenis_toga');
                            const volumeToga = document.getElementById('volume_toga');

                            function toggleTogaDetails() {
                                if (togaYa.checked) {
                                    togaDetails.style.display = 'block';
                                    jenisToga.required = true;
                                    volumeToga.required = true;
                                } else {
                                    togaDetails.style.display = 'none';
                                    jenisToga.required = false;
                                    volumeToga.required = false;
                                    jenisToga.value = '';
                                    volumeToga.value = '';
                                }
                            }

                            togaYa.addEventListener('change', toggleTogaDetails);
                            togaTidak.addEventListener('change', toggleTogaDetails);

                            // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
                            toggleTogaDetails();
                        });
                    </script>


                    <div>
                        <div class="form-group">
                            <label for="lumbung_hidup">Lumbung Hidup</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="lumbung_hidup_ya" name="lumbung_hidup" value="1"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="lumbung_hidup_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="lumbung_hidup_tidak" name="lumbung_hidup" value="0"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="lumbung_hidup_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>


                        <div id="lumbung_hidup_details" style="display: none;" class="flex flex-col">
                            <div class="form-group">
                                <label for="jenis_lumbung_hidup">Jenis Lumbung Hidup</label>
                                <select name="jenis_lumbung_hidup" id="jenis_lumbung_hidup" class="form-control"
                                    required>
                                    <option value="" disabled>Pilih Jenis Lumbung Hidup</option>
                                    @foreach ($data_pekarangan['lumbungHidup'] as $lumbung)
                                        <option value="{{ $lumbung }}"
                                            {{ old('jenis_lumbung_hidup') == $lumbung ? 'selected' : '' }}>
                                            {{ $lumbung }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="volume_lumbung_hidup">Volume Lumbung Hidup</label>
                                <input type="number" name="volume_lumbung_hidup" id="volume_lumbung_hidup"
                                    class="form-control" value="{{ old('volume_lumbung_hidup') }}" required>
                            </div>
                        </div>
                    </div>




                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const lumbungHidupYa = document.getElementById('lumbung_hidup_ya');
                            const lumbungHidupTidak = document.getElementById('lumbung_hidup_tidak');
                            const lumbungHidupDetails = document.getElementById('lumbung_hidup_details');
                            const jenisLumbungHidup = document.getElementById('jenis_lumbung_hidup');
                            const volumeLumbungHidup = document.getElementById('volume_lumbung_hidup');

                            function toggleLumbungHidupDetails() {
                                if (lumbungHidupYa.checked) {
                                    lumbungHidupDetails.style.display = 'block';
                                    jenisLumbungHidup.required = true;
                                    volumeLumbungHidup.required = true;
                                } else {
                                    lumbungHidupDetails.style.display = 'none';
                                    jenisLumbungHidup.required = false;
                                    volumeLumbungHidup.required = false;
                                    jenisLumbungHidup.value = '';
                                    volumeLumbungHidup.value = '';
                                }
                            }

                            lumbungHidupYa.addEventListener('change', toggleLumbungHidupDetails);
                            lumbungHidupTidak.addEventListener('change', toggleLumbungHidupDetails);

                            // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
                            toggleLumbungHidupDetails();
                        });
                    </script>



                    <div>
                        <div class="form-group">
                            <label for="warung_hidup">Warung Hidup</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="warung_hidup_ya" name="warung_hidup" value="1"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="warung_hidup_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="warung_hidup_tidak" name="warung_hidup" value="0"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="warung_hidup_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div id="warung_hidup_details" style="display: none;" class="flex flex-col">
                            <div class="form-group">
                                <label for="jenis_warung_hidup">Jenis Warung Hidup</label>
                                <select name="jenis_warung_hidup" id="jenis_warung_hidup" class="form-control" required>
                                    <option value="" disabled>Pilih Jenis Warung Hidup</option>
                                    @foreach ($data_pekarangan['warungHidup'] as $warung)
                                        <option value="{{ $warung }}"
                                            {{ old('jenis_warung_hidup') == $warung ? 'selected' : '' }}>
                                            {{ $warung }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="volume_warung_hidup">Volume Warung Hidup</label>
                                <input type="number" name="volume_warung_hidup" id="volume_warung_hidup"
                                    class="form-control" value="{{ old('volume_warung_hidup') }}" required>
                            </div>
                        </div>
                    </div>


                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const warungHidupYa = document.getElementById('warung_hidup_ya');
                            const warungHidupTidak = document.getElementById('warung_hidup_tidak');
                            const warungHidupDetails = document.getElementById('warung_hidup_details');
                            const jenisWarungHidup = document.getElementById('jenis_warung_hidup');
                            const volumeWarungHidup = document.getElementById('volume_warung_hidup');

                            function toggleWarungHidupDetails() {
                                if (warungHidupYa.checked) {
                                    warungHidupDetails.style.display = 'block';
                                    jenisWarungHidup.required = true;
                                    volumeWarungHidup.required = true;
                                } else {
                                    warungHidupDetails.style.display = 'none';
                                    jenisWarungHidup.required = false;
                                    volumeWarungHidup.required = false;
                                    jenisWarungHidup.value = '';
                                    volumeWarungHidup.value = '';
                                }
                            }

                            warungHidupYa.addEventListener('change', toggleWarungHidupDetails);
                            warungHidupTidak.addEventListener('change', toggleWarungHidupDetails);

                            // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
                            toggleWarungHidupDetails();
                        });
                    </script>


                    <div>
                        <div class="form-group">
                            <label for="perikanan">Perikanan</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="perikanan_ya" name="perikanan" value="1"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="perikanan_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="perikanan_tidak" name="perikanan" value="0"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="perikanan_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div id="perikanan_details" style="display: none;" class="flex flex-col">
                            <div class="form-group">
                                <label for="jenis_perikanan">Jenis Perikanan</label>
                                <select name="jenis_perikanan" id="jenis_perikanan" class="form-control" required>
                                    <option value="" disabled>Pilih Jenis Perikanan</option>
                                    @foreach ($data_pekarangan['perikanan'] as $ikan)
                                        <option value="{{ $ikan }}"
                                            {{ old('jenis_perikanan') == $ikan ? 'selected' : '' }}>
                                            {{ $ikan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="volume_perikanan">Volume Perikanan</label>
                                <input type="number" name="volume_perikanan" id="volume_perikanan" class="form-control"
                                    value="{{ old('volume_perikanan') }}" required>
                            </div>
                        </div>
                    </div>



                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const perikananYa = document.getElementById('perikanan_ya');
                            const perikananTidak = document.getElementById('perikanan_tidak');
                            const perikananDetails = document.getElementById('perikanan_details');
                            const jenisPerikanan = document.getElementById('jenis_perikanan');
                            const volumePerikanan = document.getElementById('volume_perikanan');

                            function togglePerikananDetails() {
                                if (perikananYa.checked) {
                                    perikananDetails.style.display = 'block';
                                    jenisPerikanan.required = true;
                                    volumePerikanan.required = true;
                                } else {
                                    perikananDetails.style.display = 'none';
                                    jenisPerikanan.required = false;
                                    volumePerikanan.required = false;
                                    jenisPerikanan.value = '';
                                    volumePerikanan.value = '';
                                }
                            }

                            perikananYa.addEventListener('change', togglePerikananDetails);
                            perikananTidak.addEventListener('change', togglePerikananDetails);

                            // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
                            togglePerikananDetails();
                        });
                    </script>


                    <div>
                        <div class="form-group">
                            <label for="peternakan">Peternakan</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="peternakan_ya" name="peternakan" value="1"
                                        class="custom-control-input" required
                                        {{ old('peternakan') == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="peternakan_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="peternakan_tidak" name="peternakan" value="0"
                                        class="custom-control-input" required
                                        {{ old('peternakan') == '0' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="peternakan_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div id="peternakan_details" style="display: none;" class="flex flex-col">
                            <div class="form-group">
                                <label for="jenis_peternakan">Jenis Peternakan</label>
                                <select name="jenis_peternakan" id="jenis_peternakan" class="form-control" required>
                                    <option value="" disabled>Pilih Jenis Peternakan</option>
                                    @foreach ($data_pekarangan['peternakan'] as $ternak)
                                        <option value="{{ $ternak }}"
                                            {{ old('jenis_peternakan') == $ternak ? 'selected' : '' }}>
                                            {{ $ternak }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="volume_peternakan">Volume Peternakan</label>
                                <input type="number" name="volume_peternakan" id="volume_peternakan"
                                    class="form-control" value="{{ old('volume_peternakan') }}" required>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const peternakanYa = document.getElementById('peternakan_ya');
                            const peternakanTidak = document.getElementById('peternakan_tidak');
                            const peternakanDetails = document.getElementById('peternakan_details');
                            const jenisPeternakan = document.getElementById('jenis_peternakan');
                            const volumePeternakan = document.getElementById('volume_peternakan');

                            function togglePeternakanDetails() {
                                if (peternakanYa.checked) {
                                    peternakanDetails.style.display = 'block';
                                    jenisPeternakan.required = true;
                                    volumePeternakan.required = true;
                                } else {
                                    peternakanDetails.style.display = 'none';
                                    jenisPeternakan.required = false;
                                    volumePeternakan.required = false;
                                    jenisPeternakan.value = '';
                                    volumePeternakan.value = '';
                                }
                            }

                            peternakanYa.addEventListener('change', togglePeternakanDetails);
                            peternakanTidak.addEventListener('change', togglePeternakanDetails);

                            // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
                            togglePeternakanDetails();
                        });
                    </script>

                </div>

                <div class="modal-footer">
                    <a href="/cargas" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Selanjutnya</a>
                </div>
            </form>
        </div>
    </div>
@endsection
