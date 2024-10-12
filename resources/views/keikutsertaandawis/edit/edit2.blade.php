@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Edit Data Catatan Dawis</h1>

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
                        Informasi <span class="hidden sm:inline-flex sm:ms-2">Alamat</span>
                    </span>
                </li>

                <li class="flex text-blue-600 dark:text-blue-500 items-center">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    Dawis
                </li>
            </ol>
        </div>

        <form action={{ route('dawis.update2') }} method="POST">
            @csrf
            @method('patch')

            <input type="hidden" name="id" value={{ $dawis->id }}>
            <input type="hidden" name="nik" value={{ $nik }}>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="w-full flex flex-col gap-3 bg-white my-6 py-4 px-4 rounded-lg">

                    <div class="form-group">
                        <label for="penghayatan_pengamalan_pancasila">Pengamalan Pancasila</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="penghayatan_pengamalan_pancasila_ya"
                                    name="penghayatan_pengamalan_pancasila" value="1" class="custom-control-input"
                                    required {{ $dawis->penghayatan_pengamalan_pancasila == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="penghayatan_pengamalan_pancasila_ya"> Ya
                                </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="penghayatan_pengamalan_pancasila_tidak"
                                    name="penghayatan_pengamalan_pancasila" value="0" class="custom-control-input"
                                    required {{ $dawis->penghayatan_pengamalan_pancasila == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="penghayatan_pengamalan_pancasila_tidak"> Tidak
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gotong_royong">Gotong Royong</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="gotong_royong_ya" name="gotong_royong" value="1"
                                    class="custom-control-input" required
                                    {{ $dawis->gotong_royong == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="gotong_royong_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="gotong_royong_tidak" name="gotong_royong" value="0"
                                    class="custom-control-input" required
                                    {{ $dawis->gotong_royong == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="gotong_royong_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="pendidikan_keterampilan">Pendidikan Keterampilan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pendidikan_keterampilan_ya" name="pendidikan_keterampilan"
                                    value="1" class="custom-control-input" required
                                    {{ $dawis->pendidikan_keterampilan == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="pendidikan_keterampilan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pendidikan_keterampilan_tidak" name="pendidikan_keterampilan"
                                    value="0" class="custom-control-input" required
                                    {{ $dawis->pendidikan_keterampilan == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="pendidikan_keterampilan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="kehidupan_berkolaborasi">Kehidupan Berkolaborasi</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kehidupan_berkolaborasi_ya" name="kehidupan_berkolaborasi"
                                    value="1" class="custom-control-input" required
                                    {{ $dawis->kehidupan_berkolaborasi == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kehidupan_berkolaborasi_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kehidupan_berkolaborasi_tidak" name="kehidupan_berkolaborasi"
                                    value="0" class="custom-control-input" required
                                    {{ $dawis->kehidupan_berkolaborasi == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kehidupan_berkolaborasi_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-full flex flex-col gap-3 bg-white my-6 py-4 px-4 rounded-lg">

                    <div class="form-group">
                        <label for="industri_rumahan">Kegiatan Industri</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" {{ $dawis->industri_rumahan == '1' ? 'checked' : '' }}
                                    id="industri_rumahan_ya" name="industri_rumahan" value="1"
                                    class="custom-control-input" required>
                                <label class="custom-control-label" for="industri_rumahan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" {{ $dawis->industri_rumahan == '0' ? 'checked' : '' }}
                                    id="industri_rumahan_tidak" name="industri_rumahan" value="0"
                                    class="custom-control-input" required>
                                <label class="custom-control-label" for="industri_rumahan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div id="sandangPangan">
                        <div class="form-group">
                            <label for="pangan">Pangan</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="pangan_ya" name="pangan" value="1"
                                        class="custom-control-input" required
                                        {{ $dawis->pangan == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="pangan_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="pangan_tidak" name="pangan" value="0"
                                        class="custom-control-input" required
                                        {{ $dawis->pangan == '0' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="pangan_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sandang">Sandang</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="sandang_ya" name="sandang" value="1"
                                        class="custom-control-input" required
                                        {{ $dawis->sandang == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="sandang_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="sandang_tidak" name="sandang" value="0"
                                        class="custom-control-input" required
                                        {{ $dawis->sandang == '0' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="sandang_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jasa">Jasa</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="jasa_ya" name="jasa" value="1"
                                        class="custom-control-input" required {{ $dawis->jasa == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="jasa_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="jasa_tidak" name="jasa" value="0"
                                        class="custom-control-input" required {{ $dawis->jasa == '0' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="jasa_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const radioYa = document.getElementById('industri_rumahan_ya');
                            const radioTidak = document.getElementById('industri_rumahan_tidak');
                            const sandangPanganDiv = document.getElementById('sandangPangan');

                            // Fungsi untuk menampilkan atau menyembunyikan div sandangPangan
                            function toggleSandangPangan() {
                                if (radioYa.checked) {
                                    sandangPanganDiv.style.display = 'block';
                                } else {
                                    sandangPanganDiv.style.display = 'none';
                                }
                            }

                            // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
                            toggleSandangPangan();

                            // Tambahkan event listener untuk kedua radio button
                            radioYa.addEventListener('change', toggleSandangPangan);
                            radioTidak.addEventListener('change', toggleSandangPangan);
                        });
                    </script>



                    <div class="form-group">
                        <label for="kegiatan_kesehatan">Kegiatan Kesehatan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kegiatan_kesehatan_ya" name="kegiatan_kesehatan"
                                    value="1" class="custom-control-input" required
                                    {{ $dawis->kegiatan_kesehatan == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kegiatan_kesehatan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kegiatan_kesehatan_tidak" name="kegiatan_kesehatan"
                                    value="0" class="custom-control-input" required
                                    {{ $dawis->kegiatan_kesehatan == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kegiatan_kesehatan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="perencanaan_kesehatan">Perencanaan Kesehatan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="perencanaan_kesehatan_ya" name="perencanaan_kesehatan"
                                    value="1" class="custom-control-input" required
                                    {{ $dawis->perencanaan_kesehatan == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="perencanaan_kesehatan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="perencanaan_kesehatan_tidak" name="perencanaan_kesehatan"
                                    value="0" class="custom-control-input" required
                                    {{ $dawis->perencanaan_kesehatan == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="perencanaan_kesehatan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <a href={{ route('dawis.edit', $nik) }} type="button" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</a>
            </div>
        </form>
    </div>
@endsection
