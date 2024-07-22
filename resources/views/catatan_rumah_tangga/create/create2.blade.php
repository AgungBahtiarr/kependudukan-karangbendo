@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Catatan Rumah Tangga</h1>


        {{-- <div class="my-4   w-72 flex justify-around items-center">
            <a href="" class="bg-[#cfdfe3] py-3 px-2 rounded-sm">Informasi Umum</a>
            <a href="">Alamat</a>
        </div> --}}



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
