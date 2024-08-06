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

        <form action={{ route('dawis.update') }} method="POST">
            @csrf
            @method('patch')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
                    <input type="hidden" name="id" value={{ $dawis->id }}>
                    <input type="hidden" name="nik" class="form-control" required value={{ $nik }}
                        @readonly(true)>

                    <div class="form-group">
                        <label for="akseptor_kb">Akseptor KB</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kb_ya" name="akseptor_kb" value="1"
                                    class="custom-control-input" required {{ $dawis->akseptor_kb == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kb_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kb_tidak" name="akseptor_kb" value="0"
                                    class="custom-control-input" required {{ $dawis->akseptor_kb == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kb_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="jenis_kb">Jenis KB</label>
                        {{-- <input type="text" name="jenis_kb" class="form-control" placeholder="Intra Uterine Device,Implan,Sterilisasi dll" required
                            value={{ $dawisSession ? $dawisSession['jenis_kb'] : '' }}> --}}
                        <select class="form-control" name="jenis_kb">
                            <option value="" selected disabled>Pilih Jenis KB</option>
                            @foreach ($jenisKb as $kb)
                                <option {{ $dawis->jenis_kb == $kb ? 'selected' : '' }} value={{ $kb }}>
                                    {{ $kb }}
                                </option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="posyandu">Posyandu</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="posyandu_ya" name="posyandu" value="1"
                                    class="custom-control-input" required {{ $dawis->posyandu == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="posyandu_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="posyandu_tidak" name="posyandu" value="0"
                                    class="custom-control-input" required {{ $dawis->posyandu == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="posyandu_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="frekuensi_posyandu">Frekuensi Posyandu</label>
                        <input type="number" name="frekuensi_posyandu" class="form-control"
                            {{ $dawis->posyandu == '1' ? 'required' : '' }} value={{ $dawis->frekuensi_posyandu }}>
                    </div>

                    <div class="form-group">
                        <label for="binabalita">Bina Keluarga Balita</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="binabalita_ya" name="bina_keluarga_balita" value="1"
                                    class="custom-control-input" required
                                    {{ $dawis->bina_keluarga_balita == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="binabalita_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="binabalita_tidak" name="bina_keluarga_balita" value="0"
                                    class="custom-control-input" required
                                    {{ $dawis->bina_keluarga_balita == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="binabalita_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tabungan">Memiliki Tabungan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tabungan_ya" name="memiliki_tabungan" value="1"
                                    class="custom-control-input" required
                                    {{ $dawis->memiliki_tabungan == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="tabungan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tabungan_tidak" name="memiliki_tabungan" value="0"
                                    class="custom-control-input" required
                                    {{ $dawis->memiliki_tabungan == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="tabungan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="w-full bg-white flex flex-col gap-2 my-6 py-4 px-4 rounded-lg">
                    <div class="form-group">
                        <label for="kelompok_belajar">Kelompok Belajar</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input hx-trigger="click" hx-post="/dawis/isKelompokBelajar/1" hx-method="POST"
                                     hx-swap="innerHtml" hx-target="#jenisKelompok"
                                    type="radio" id="kelompok_belajar_ya" name="kelompok_belajar" value="1"
                                    class="custom-control-input" required
                                    {{ $dawis->kelompok_belajar == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kelompok_belajar_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input hx-trigger="click" hx-post="/dawis/isKelompokBelajar/0" hx-method="POST"
                                     hx-swap="innerHtml" hx-target="#jenisKelompok"
                                    type="radio" id="kelompok_belajar_tidak" name="kelompok_belajar" value="0"
                                    class="custom-control-input" required
                                    {{ $dawis->kelompok_belajar == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kelompok_belajar_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    @if ($dawis->id_jenis_kelompok_belajar == null && $dawis->kelompok_belajar == 0)
                        <div class="form-group">
                            <label for="jenis_kelompok_belajar">Jenis Kelompok Belajar</label>
                            <select class="form-control" name="id_jenis_kelompok_belajar" required>
                                <option value="" selected disabled>Pilih Jenis Kelompok Belajar</option>
                                @foreach ($kelompokBelajars as $kelompokBelajar)
                                    <option value={{ $kelompokBelajar->id }}>
                                        {{ $kelompokBelajar->nama_kelompok_belajar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div id="jenisKelompok">
                            <div class="form-group">
                                <label for="jenis_kelompok_belajar">Jenis Kelompok Belajar</label>
                                <select class="form-control" name="id_jenis_kelompok_belajar" required>
                                    @foreach ($kelompokBelajars as $kelompokBelajar)
                                        <option value={{ $kelompokBelajar->id }}
                                            {{ $dawis->id_jenis_kelompok_belajar == $kelompokBelajar->id ? 'selected' : '' }}>
                                            {{ $kelompokBelajar->nama_kelompok_belajar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif




                    <div class="form-group">
                        <label for="paud">Paud</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="paud_ya" name="paud" value="1"
                                    class="custom-control-input" required {{ $dawis->paud == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="paud_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="paud_tidak" name="paud" value="0"
                                    class="custom-control-input" required {{ $dawis->paud == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="paud_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="koperasi">Koperasi</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="koperasi_ya" name="koperasi" value="1"
                                    class="custom-control-input" required {{ $dawis->koperasi == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="koperasi_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="koperasi_tidak" name="koperasi" value="0"
                                    class="custom-control-input" required {{ $dawis->koperasi == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="koperasi_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="jenis_koperasi">Jenis Koperasi</label>
                        <input type="text" name="jenis_koperasi" class="form-control"
                            {{ $dawis->koperasi == '1' ? 'required' : '' }} value={{ $dawis->jenis_koperasi }}>
                    </div>

                    <div class="form-group">
                        <label for="berkebutuhan_khusus">Berkebutuhan Khusus</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="berkebutuhan_khusus_ya" name="berkebutuhan_khusus"
                                    value="1" class="custom-control-input" required
                                    {{ $dawis->berkebutuhan_khusus == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="berkebutuhan_khusus_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="berkebutuhan_khusus_tidak" name="berkebutuhan_khusus"
                                    value="0" class="custom-control-input" required
                                    {{ $dawis->berkebutuhan_khusus == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="berkebutuhan_khusus_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <a href={{ route('wargas.edit1', $warga->id) }} type="button" class="btn btn-secondary"
                    data-dismiss="modal">Kembali</a>
                <button type="submit" class="btn btn-primary">Selanjutnya</a>
            </div>
        </form>
    </div>
@endsection
