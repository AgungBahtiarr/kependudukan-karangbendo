@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Catatan Keluarga</h1>

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
                    class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <span class="me-2">3</span>
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
            <form action="{{ route('cargas.store3') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="jumlah_balita">Jumlah Balita</label>
                        <input type="number" min="0" name="jumlah_balita" class="form-control" required
                            value={{ $cargasSession ? $cargasSession['jumlah_balita'] : '' }}>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_pus">Jumlah Pria Usia Subur</label>
                        <input type="number" min="0" name="jumlah_pus" class="form-control" required
                            value={{ $cargasSession ? $cargasSession['jumlah_pus'] : '' }}>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_wus">Jumlah Wanita Usia Subur</label>
                        <input type="number" min="0" name="jumlah_wus" class="form-control" required
                            value={{ $cargasSession ? $cargasSession['jumlah_wus'] : '' }}>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_ibu_hamil">Jumlah Ibu Hamil</label>
                        <input type="number" min="0" name="jumlah_ibu_hamil" class="form-control" required
                            value={{ $cargasSession ? $cargasSession['jumlah_ibu_hamil'] : '' }}>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_lansia">Jumlah Lansia</label>
                        <input type="number" min="0" name="jumlah_lansia" class="form-control" required
                            value={{ $cargasSession ? $cargasSession['jumlah_lansia'] : '' }}>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_ibu_menyusui">Jumlah Ibu Menyusui</label>
                        <input type="number" min="0" name="jumlah_ibu_menyusui" class="form-control" required
                            value={{ $cargasSession ? $cargasSession['jumlah_ibu_menyusui'] : '' }}>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_buta_baca">Jumlah Buta Baca</label>
                        <input type="number" min="0" name="jumlah_buta_baca" class="form-control" required
                            value={{ $cargasSession ? $cargasSession['jumlah_buta_baca'] : '' }}>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_buta_tulis">Jumlah Buta Tulis</label>
                        <input type="number" min="0" name="jumlah_buta_tulis" class="form-control" required
                            value={{ $cargasSession ? $cargasSession['jumlah_buta_tulis'] : '' }}>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_buta_hitung">Jumlah Buta Hitung</label>
                        <input type="number" min="0" name="jumlah_buta_hitung" class="form-control" required
                            value={{ $cargasSession ? $cargasSession['jumlah_buta_hitung'] : '' }}>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_berkebutuhan_khusus">Jumlah Berkebutuhan Khusus</label>
                        <input type="number" min="0" name="jumlah_berkebutuhan_khusus" class="form-control" required
                            value={{ $cargasSession ? $cargasSession['jumlah_berkebutuhan_khusus'] : '' }}>
                    </div>
                </div>



                <div class="modal-footer">
                    <a hx-post={{ route('cargas.back2') }} hx-trigger="click" type="button"
                        class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Selanjutnya</a>
                </div>
            </form>
        </div>
    </div>
@endsection
