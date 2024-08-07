@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Catatan Rumah Tangga</h1>

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
                    class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <span class="me-2">2</span>
                        Jumlah <span class="hidden sm:inline-flex sm:ms-2">Keluarga</span>
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


        <div class="mt-4">
            @error('error')
                <div class="alert alert-danger" role="alert">
                    <div class="iq-alert-text">{{ $errors->first() }}</div>
                </div>
            @enderror
        </div>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('cargas.store1') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="nkk">No Kartu Keluarga</label>
                        <input type="text" minlength="16" maxlength="16" name="nkk" class="form-control" required
                            value={{ $cargasSession ? $cargasSession['nkk'] : '' }}>
                    </div>


                    <div class="form-group">
                        <label for="satu_rumah_satu_kk">Satu Rumah Satu Kartu Keluarga</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input hx-trigger="click" hx-post="/cargas/isNkkInang/1" hx-swap="innerHtml"
                                    hx-target="#nkkInang" type="radio" id="satu_kk_ya" name="satu_rumah_satu_kk"
                                    value="1" class="custom-control-input"
                                    {{ $cargasSession && $cargasSession['satu_rumah_satu_kk'] == '1' ? 'checked' : '' }}
                                    required>
                                <label class="custom-control-label" for="satu_kk_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input hx-trigger="click" hx-post="/cargas/isNkkInang/0" hx-swap="innerHtml"
                                    hx-target="#nkkInang" type="radio" id="satu_kk_tidak" name="satu_rumah_satu_kk"
                                    value="0" class="custom-control-input"
                                    {{ $cargasSession && $cargasSession['satu_rumah_satu_kk'] == '0' ? 'checked' : '' }}
                                    required>
                                <label class="custom-control-label" for="satu_kk_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="form-group">
                        <label for="jumlah_jamban_keluarga">Jumlah Jamban Keluarga</label>
                        <input type="number" name="jumlah_jamban_keluarga" class="form-control" required
                            value={{ $cargasSession ? $cargasSession['jumlah_jamban_keluarga'] : '' }}>
                    </div>


                    @if ($cargasSession && $cargasSession['satu_rumah_satu_kk'] == 0)
                        <div id="nkkInang">
                            <div class="form-group">
                                <label for="nkk_inang">Nomor Kartu Keluarga Induk</label>
                                <input type="text" minlength="16" maxlength="16" name="nkk_inang" class="form-control"
                                    required value={{ $cargasSession ? $cargasSession['nkk_inang'] : '' }}>
                            </div>
                        </div>
                    @else
                        <div id="nkkInang">

                        </div>
                    @endif

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="kriteria_rumah">Kriteria Rumah</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kriteria_rumah_ya" name="kriteria_rumah" value="1"
                                    class="custom-control-input"
                                    {{ $cargasSession && $cargasSession['kriteria_rumah'] == '1' ? 'checked' : '' }}
                                    required>
                                <label class="custom-control-label" for="kriteria_rumah_ya"> Layak Huni </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kriteria_rumah_tidak" name="kriteria_rumah" value="0"
                                    class="custom-control-input"
                                    {{ $cargasSession && $cargasSession['kriteria_rumah'] == '0' ? 'checked' : '' }}
                                    required>
                                <label class="custom-control-label" for="kriteria_rumah_tidak"> Tidak Layak Huni </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ada_tempat_sampah">Ada Tempat Sampah</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tempat_sampah_ya" name="ada_tempat_sampah" value="1"
                                    class="custom-control-input"
                                    {{ $cargasSession && $cargasSession['ada_tempat_sampah'] == '1' ? 'checked' : '' }}
                                    required>
                                <label class="custom-control-label" for="tempat_sampah_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tempat_sampah_tidak" name="ada_tempat_sampah" value="0"
                                    class="custom-control-input"
                                    {{ $cargasSession && $cargasSession['ada_tempat_sampah'] == '0' ? 'checked' : '' }}
                                    required>
                                <label class="custom-control-label" for="tempat_sampah_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ada_saluran_pembuangan_limbah">Ada Saluran Pembuangan Limbah</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="limbah_ya" name="ada_saluran_pembuangan_limbah" value="1"
                                    class="custom-control-input"
                                    {{ $cargasSession && $cargasSession['ada_saluran_pembuangan_limbah'] == '1' ? 'checked' : '' }}
                                    required>
                                <label class="custom-control-label" for="limbah_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="limbah_tidak" name="ada_saluran_pembuangan_limbah"
                                    value="0" class="custom-control-input"
                                    {{ $cargasSession && $cargasSession['ada_saluran_pembuangan_limbah'] == '0' ? 'checked' : '' }}
                                    required>
                                <label class="custom-control-label" for="limbah_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_sumber_air">Sumber Air</label>
                        <select class="form-control" name="id_sumber_air" required>
                            @if ($cargasSession)
                                @foreach ($sumbers as $sumber)
                                    <option value={{ $sumber->id }}
                                        {{ $cargasSession['id_sumber_air'] == $sumber->id ? 'selected' : '' }}>
                                        {{ $sumber->nama_sumber_air }}</option>
                                @endforeach
                            @else
                                <option value="" selected>Pilih Jenis Sumber Air</option>
                                @foreach ($sumbers as $sumber)
                                    <option value={{ $sumber->id }}>{{ $sumber->nama_sumber_air }}</option>
                                @endforeach
                            @endif
                        </select>
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
