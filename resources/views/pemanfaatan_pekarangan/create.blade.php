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

                <div class="grid grid-cols-2 gap-4">

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

                    <div class="form-group">
                        <label for="peternakanan">Peternakanan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="peternakanan_ya" name="peternakan" value="1"
                                    class="custom-control-input" required>
                                <label class="custom-control-label" for="peternakanan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="peternakanan_tidak" name="peternakan" value="0"
                                    class="custom-control-input" required>
                                <label class="custom-control-label" for="peternakanan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <a href="/cargas" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Selanjutnya</a>
                </div>
            </form>
        </div>
    </div>
@endsection
