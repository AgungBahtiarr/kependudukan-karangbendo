@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Data Industri Rumah Tangga</h1>

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
                <li class="flex text-blue-600 dark:text-blue-500 items-center">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    Industri <span class="hidden sm:inline-flex sm:ms-2">Keluarga</span>
                </li>
            </ol>
        </div>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('industries.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id_carga" value={{ $carga->id }}>

                <div class="form-group">
                    <label for="nkk">No Kartu Keluarga</label>
                    <input type="text" name="nkk" value={{ $carga->nkk }} @readonly(true) class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label for="nama_usaha">Nama Usaha</label>
                    <input type="text" name="nama_usaha" class="form-control" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex flex-col">
                        <div class="form-group">
                            <label for="bidang_sandang">Bidang Sandang</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="bidang_sandang_ya" name="bidang_sandang" value="1"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="bidang_sandang_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="bidang_sandang_tidak" name="bidang_sandang" value="0"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="bidang_sandang_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div id="bidang_sandang_keterangan" style="display: none;">
                            <div class="form-group">
                                <label for="keterangan_bidang_sandang">Keterangan Bidang Sandang</label>
                                <input type="text" id="keterangan_sandang" name="keterangan_sandang"
                                    class="form-control">
                            </div>
                        </div>
                    </div>


                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const bidangSandangYa = document.getElementById('bidang_sandang_ya');
                            const bidangSandangTidak = document.getElementById('bidang_sandang_tidak');
                            const bidangSandangKeterangan = document.getElementById('bidang_sandang_keterangan');
                            const keteranganInput = document.getElementById('keterangan_bidang_sandang');

                            function toggleBidangSandangKeterangan() {
                                if (bidangSandangYa.checked) {
                                    bidangSandangKeterangan.style.display = 'block';
                                    keteranganInput.required = true;
                                } else {
                                    bidangSandangKeterangan.style.display = 'none';
                                    keteranganInput.required = false;
                                    keteranganInput.value = ''; // Reset nilai input
                                }
                            }

                            bidangSandangYa.addEventListener('change', toggleBidangSandangKeterangan);
                            bidangSandangTidak.addEventListener('change', toggleBidangSandangKeterangan);

                            // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
                            toggleBidangSandangKeterangan();
                        });
                    </script>


                    <div class="flex flex-col">
                        <div class="form-group">
                            <label for="bidang_pangan">Bidang Pangan</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="bidang_pangan_ya" name="bidang_pangan" value="1"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="bidang_pangan_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="bidang_pangan_tidak" name="bidang_pangan" value="0"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="bidang_pangan_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div id="bidang_pangan_keterangan" style="display: none;">
                            <div class="form-group">
                                <label for="keterangan_bidang_pangan">Keterangan Bidang Pangan</label>
                                <input type="text" id="keterangan_bidang_pangan" name="keterangan_pangan"
                                    class="form-control">
                            </div>
                        </div>
                    </div>


                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const bidangPanganYa = document.getElementById('bidang_pangan_ya');
                            const bidangPanganTidak = document.getElementById('bidang_pangan_tidak');
                            const bidangPanganKeterangan = document.getElementById('bidang_pangan_keterangan');
                            const keteranganInput = document.getElementById('keterangan_bidang_pangan');

                            function toggleBidangPanganKeterangan() {
                                if (bidangPanganYa.checked) {
                                    bidangPanganKeterangan.style.display = 'block';
                                    keteranganInput.required = true;
                                } else {
                                    bidangPanganKeterangan.style.display = 'none';
                                    keteranganInput.required = false;
                                    keteranganInput.value = ''; // Reset nilai input
                                }
                            }

                            bidangPanganYa.addEventListener('change', toggleBidangPanganKeterangan);
                            bidangPanganTidak.addEventListener('change', toggleBidangPanganKeterangan);

                            // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
                            toggleBidangPanganKeterangan();
                        });
                    </script>


                    <div class="flex flex-col">
                        <div class="form-group">
                            <label for="bidang_jasa">Bidang Jasa</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="bidang_jasa_ya" name="bidang_jasa" value="1"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="bidang_jasa_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="bidang_jasa_tidak" name="bidang_jasa" value="0"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="bidang_jasa_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div id="bidang_jasa_keterangan" style="display: none;">
                            <div class="form-group">
                                <label for="keterangan_bidang_jasa">Keterangan Bidang Jasa</label>
                                <input type="text" id="keterangan_bidang_jasa" name="keterangan_jasa"
                                    class="form-control">
                            </div>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const bidangJasaYa = document.getElementById('bidang_jasa_ya');
                                const bidangJasaTidak = document.getElementById('bidang_jasa_tidak');
                                const bidangJasaKeterangan = document.getElementById('bidang_jasa_keterangan');
                                const keteranganInput = document.getElementById('keterangan_bidang_jasa');

                                function toggleBidangJasaKeterangan() {
                                    if (bidangJasaYa.checked) {
                                        bidangJasaKeterangan.style.display = 'block';
                                        keteranganInput.required = true;
                                    } else {
                                        bidangJasaKeterangan.style.display = 'none';
                                        keteranganInput.required = false;
                                        keteranganInput.value = ''; // Reset nilai input
                                    }
                                }

                                bidangJasaYa.addEventListener('change', toggleBidangJasaKeterangan);
                                bidangJasaTidak.addEventListener('change', toggleBidangJasaKeterangan);

                                // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
                                toggleBidangJasaKeterangan();
                            });
                        </script>
                    </div>


                </div>

                <div class="modal-footer">
                    <a href="/cargas" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>
    </div>
@endsection
