@extends('layouts.app')


@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Edit Data Warga</h1>


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

                <li class="flex items-center">
                    <span class="me-2">3</span>
                    Dawis
                </li>
            </ol>
        </div>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('wargas.update') }}" method="POST">
                @method('patch')

                @csrf
                <input type="hidden" name="id" value={{ $warga->id }}>
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" name="alamat_prov" class="form-control" required
                        value={{ $wargaSession ? $wargaSession['alamat_prov'] : $warga->alamat_prov }}>
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kabupaten</label>
                    <input type="text" name="alamat_kab" class="form-control" required
                        value={{ $wargaSession ? $wargaSession['alamat_kab'] : $warga->alamat_kab }}>
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kecamatan</label>
                    <input type="text" name="alamat_kec" class="form-control" required
                        value={{ $wargaSession ? $wargaSession['alamat_kec'] : $warga->alamat_kec }}>
                </div>
                <div class="form-group">
                    <label for="desa kel">Desa/Kelurahan</label>
                    <input type="text" name="alamat_desakel" class="form-control" required
                        value={{ $wargaSession ? $wargaSession['alamat_desakel'] : $warga->alamat_desakel }}>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" minlength="3" maxlength="3" name="rt" class="form-control" required
                            value={{ $wargaSession ? $wargaSession['rt'] : $warga->rt }}>
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="text" minlength="3" maxlength="3" name="rw" class="form-control" required
                            value={{ $wargaSession ? $wargaSession['rw'] : $warga->rw }}>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat_jalan">Alamat Jalan</label>
                    <input type="text" name="alamat_jalan" class="form-control" required
                        value={{ $wargaSession ? $wargaSession['alamat_jalan'] : $warga->alamat_jalan }}>
                </div>

                <div class="modal-footer">
                    <a hx-patch={{ route('wargas-edit.back') }} hx-trigger="click" type="button"
                        class="btn btn-secondary text-white">Kembali</a>
                    {{-- <a href="/warga/create/1">back</a> --}}
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
