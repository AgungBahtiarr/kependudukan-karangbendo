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



        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('cargas.store2') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="form-group">
                        <label for="menempel_stiker_p4k">Menempel Stiker P4K</label>
                        <div class="form-group">

                            @if ($cargasSession)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="menempel_stiker_p4k_ya" name="menempel_stiker_p4k"
                                        value="1" {{ $cargasSession['menempel_stiker_p4k'] == '1' ? 'checked' : '' }}
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="menempel_stiker_p4k_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="menempel_stiker_p4k_tidak" name="menempel_stiker_p4k"
                                        value="0" {{ $cargasSession['menempel_stiker_p4k'] == '0' ? 'checked' : '' }}
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="menempel_stiker_p4k_tidak"> Tidak </label>
                                </div>
                            @else
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="menempel_stiker_p4k_ya" name="menempel_stiker_p4k"
                                        value="1" class="custom-control-input" required>
                                    <label class="custom-control-label" for="menempel_stiker_p4k_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="menempel_stiker_p4k_tidak" name="menempel_stiker_p4k"
                                        value="0" class="custom-control-input" required>
                                    <label class="custom-control-label" for="menempel_stiker_p4k_tidak"> Tidak </label>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_makanan_pokok">Jenis Makanan Pokok</label>
                        <select class="form-control" name="id_makanan_pokok">

                            @if ($cargasSession)
                                @foreach ($makanans as $makanan)
                                    <option value={{ $makanan->id }}
                                        {{ $cargasSession['id_makanan_pokok'] == $makanan->id ? 'selected' : '' }}>
                                        {{ $makanan->nama_makanan_pokok }}</option>
                                @endforeach
                            @else
                                <option selected>Pilih Jenis Makanan Pokok</option>
                                @foreach ($makanans as $makanan)
                                    <option value={{ $makanan->id }}>{{ $makanan->nama_makanan_pokok }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


                    <div class="form-group">
                        <label for="aktivitas_up2k">Aktivitas UP2K</label>

                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input hx-trigger="click" hx-post="/cargas/isUp2k/1" hx-swap="innerHtml"
                                    hx-target="#jenisUp2k" type="radio" id="aktivitas_up2k_ya" name="aktivitas_up2k"
                                    value="1"
                                    {{ $cargasSession && $cargasSession['aktivitas_up2k'] == '1' ? 'checked' : '' }}
                                    class="custom-control-input" required>
                                <label class="custom-control-label" for="aktivitas_up2k_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input hx-trigger="click" hx-post="/cargas/isUp2k/0" hx-swap="innerHtml"
                                    hx-target="#jenisUp2k" type="radio" id="aktivitas_up2k_tidak" name="aktivitas_up2k"
                                    value="0"
                                    {{ $cargasSession && $cargasSession['aktivitas_up2k'] == '0' ? 'checked' : '' }}
                                    class="custom-control-input" required>
                                <label class="custom-control-label" for="aktivitas_up2k_tidak"> Tidak </label>
                            </div>
                        </div>

                    </div>

                    @if ($cargasSession && $cargasSession['aktivitas_up2k'] == 1)
                        <div id="jenisUp2k">
                            <div class="form-group">
                                <label for="jenis_up2k">Jenis UP2K</label>
                                <input type="text" name="jenis_up2k" class="form-control" required
                                    value={{ $cargasSession ? $cargasSession['jenis_up2k'] : '' }}>
                            </div>
                        </div>
                    @else
                        <div id="jenisUp2k">

                        </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="usaha_kesehatan_lingkungan">Usaha Kesehatan Lingkungan</label>

                        @if ($cargasSession)
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="usaha_kesehatan_lingkungan_ya"
                                        name="usaha_kesehatan_lingkungan" value="1"
                                        {{ $cargasSession['usaha_kesehatan_lingkungan'] == '1' ? 'checked' : '' }}
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="usaha_kesehatan_lingkungan_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="usaha_kesehatan_lingkungan_tidak"
                                        name="usaha_kesehatan_lingkungan" value="0"
                                        {{ $cargasSession['usaha_kesehatan_lingkungan'] == '0' ? 'checked' : '' }}
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="usaha_kesehatan_lingkungan_tidak"> Tidak
                                    </label>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="usaha_kesehatan_lingkungan_ya"
                                        name="usaha_kesehatan_lingkungan" value="1" class="custom-control-input"
                                        required>
                                    <label class="custom-control-label" for="usaha_kesehatan_lingkungan_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="usaha_kesehatan_lingkungan_tidak"
                                        name="usaha_kesehatan_lingkungan" value="0" class="custom-control-input"
                                        required>
                                    <label class="custom-control-label" for="usaha_kesehatan_lingkungan_tidak"> Tidak
                                    </label>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label for="pemanfaatan_pekarangan">Pemanfaatan Pekarangan</label>
                        @if ($cargasSession)
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="pemanfaatan_pekarangan_ya" name="pemanfaatan_pekarangan"
                                        value="1" class="custom-control-input"
                                        {{ $cargasSession['pemanfaatan_pekarangan'] == '1' ? 'checked' : '' }} required>
                                    <label class="custom-control-label" for="pemanfaatan_pekarangan_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="pemanfaatan_pekarangan_tidak" name="pemanfaatan_pekarangan"
                                        value="0" class="custom-control-input"
                                        {{ $cargasSession['pemanfaatan_pekarangan'] == '0' ? 'checked' : '' }} required>
                                    <label class="custom-control-label" for="pemanfaatan_pekarangan_tidak"> Tidak </label>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="pemanfaatan_pekarangan_ya" name="pemanfaatan_pekarangan"
                                        value="1" class="custom-control-input" required>
                                    <label class="custom-control-label" for="pemanfaatan_pekarangan_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="pemanfaatan_pekarangan_tidak" name="pemanfaatan_pekarangan"
                                        value="0" class="custom-control-input" required>
                                    <label class="custom-control-label" for="pemanfaatan_pekarangan_tidak"> Tidak </label>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label for="industri_rumah_tangga">Industri Rumah Tangga</label>
                        @if ($cargasSession)
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="industri_rumah_tangga_ya" name="industri_rumah_tangga"
                                        value="1" class="custom-control-input"
                                        {{ $cargasSession['industri_rumah_tangga'] == '1' ? 'checked' : '' }} required>
                                    <label class="custom-control-label" for="industri_rumah_tangga_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="industri_rumah_tangga_tidak" name="industri_rumah_tangga"
                                        value="0" class="custom-control-input"
                                        {{ $cargasSession['industri_rumah_tangga'] == '0' ? 'checked' : '' }} required>
                                    <label class="custom-control-label" for="industri_rumah_tangga_tidak"> Tidak </label>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="industri_rumah_tangga_ya" name="industri_rumah_tangga"
                                        value="1" class="custom-control-input" required>
                                    <label class="custom-control-label" for="industri_rumah_tangga_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="industri_rumah_tangga_tidak" name="industri_rumah_tangga"
                                        value="0" class="custom-control-input" required>
                                    <label class="custom-control-label" for="industri_rumah_tangga_tidak"> Tidak </label>
                                </div>
                            </div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="kerja_bakti">Kerja Bakti</label>
                        @if ($cargasSession)
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="kerja_bakti_ya" name="kerja_bakti" value="1"
                                        class="custom-control-input"
                                        {{ $cargasSession['kerja_bakti'] == '1' ? 'checked' : '' }} required>
                                    <label class="custom-control-label" for="kerja_bakti_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="kerja_bakti_tidak" name="kerja_bakti" value="0"
                                        class="custom-control-input"
                                        {{ $cargasSession['kerja_bakti'] == '0' ? 'checked' : '' }} required>
                                    <label class="custom-control-label" for="kerja_bakti_tidak"> Tidak </label>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="kerja_bakti_ya" name="kerja_bakti" value="1"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="kerja_bakti_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="kerja_bakti_tidak" name="kerja_bakti" value="0"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="kerja_bakti_tidak"> Tidak </label>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>


                <div class="modal-footer">
                    <a hx-post={{ route('cargas.back') }} hx-trigger="click" type="button"
                        class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Selanjutnya</a>
                </div>
            </form>
        </div>
    </div>
@endsection
