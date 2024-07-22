@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Data Catatan Dawis</h1>

        <div class="my-4 w-96 flex items-center">
            <a href="" class="bg-[#cfdfe3] py-3 px-2 rounded-sm">Catatan Dawis</a>
        </div>

        <form action={{ route('dawis.store') }} method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
                    <input type="hidden" name="nik" class="form-control" required value={{ $nik }}
                        @readonly(true)>

                    <div class="form-group">
                        <label for="akseptor_kb">Akseptor KB</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input hx-trigger="click" hx-post="/dawis/isJenisKb/1" hx-swap="innerHtml"
                                    hx-target="#jenisKb" type="radio" id="kb_ya" name="akseptor_kb" value="1"
                                    class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['akseptor_kb'] == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kb_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input hx-trigger="click" hx-post="/dawis/isJenisKb/0" hx-swap="innerHtml"
                                    hx-target="#jenisKb" type="radio" id="kb_tidak" name="akseptor_kb" value="0"
                                    class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['akseptor_kb'] == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kb_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                    <div id="jenisKb" hx-swap="innerHtml" hx-trigger="load"
                        hx-post="{{ $dawisSession && $dawisSession['akseptor_kb'] == '1' ? '/dawis/isJenisKb/1' : '' }}">
                    </div>


                    <div class="form-group">
                        <label for="posyandu">Posyandu</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input hx-trigger="click" hx-post="/dawis/isPosyandu/1" hx-swap="innerHtml"
                                    hx-target="#frekPos" type="radio" id="posyandu_ya" name="posyandu" value="1"
                                    class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['posyandu'] == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="posyandu_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input hx-trigger="click" hx-post="/dawis/isPosyandu/0" hx-swap="innerHtml"
                                    hx-target="#frekPos" type="radio" type="radio" id="posyandu_tidak" name="posyandu"
                                    value="0" class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['posyandu'] == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="posyandu_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    @if ($dawisSession && $dawisSession['posyandu'] == 1)
                        <div id="frekPos">
                            <div class="form-group">
                                <label for="frekuensi_posyandu">Frekuensi Posyandu</label>
                                <input type="number" name="frekuensi_posyandu" class="form-control" required
                                    value={{ $dawisSession ? $dawisSession['frekuensi_posyandu'] : '' }}>
                            </div>
                        </div>
                    @else
                        <div id="frekPos"></div>
                    @endif

                    <div class="form-group">
                        <label for="binabalita">Bina Keluarga Balita</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="binabalita_ya" name="bina_keluarga_balita" value="1"
                                    class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['bina_keluarga_balita'] == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="binabalita_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="binabalita_tidak" name="bina_keluarga_balita" value="0"
                                    class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['bina_keluarga_balita'] == '0' ? 'checked' : '' }}>
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
                                    {{ $dawisSession && $dawisSession['memiliki_tabungan'] == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="tabungan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tabungan_tidak" name="memiliki_tabungan" value="0"
                                    class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['memiliki_tabungan'] == '0' ? 'checked' : '' }}>
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
                                <input hx-trigger="click" hx-post="/dawis/isKelompokBelajar/1" hx-swap="innerHtml"
                                    hx-target="#jenisKelompok" type="radio" id="kelompok_belajar_ya"
                                    name="kelompok_belajar" value="1" class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['kelompok_belajar'] == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kelompok_belajar_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input hx-trigger="click" hx-post="/dawis/isKelompokBelajar/0" hx-swap="innerHtml"
                                    hx-target="#jenisKelompok" type="radio" id="kelompok_belajar_tidak"
                                    name="kelompok_belajar" value="0" class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['kelompok_belajar'] == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kelompok_belajar_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                    @if ($dawisSession)
                        @if ($dawisSession['id_jenis_kelompok_belajar'] == '4')
                            <div id="jenisKelompok"></div>
                        @else
                            <div id="jenisKelompok">
                                <div class="form-group">
                                    <label for="jenis_kelompok_belajar">Jenis Kelompok Belajar</label>
                                    <select class="form-control" name="id_jenis_kelompok_belajar" required>
                                        @foreach ($kelompokBelajars as $kelompokBelajar)
                                            <option value={{ $kelompokBelajar->id }}
                                                {{ $dawisSession['id_jenis_kelompok_belajar'] == $kelompokBelajar->id ? 'selected' : '' }}>
                                                {{ $kelompokBelajar->nama_kelompok_belajar }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    @else
                        <div id="jenisKelompok"></div>
                    @endif




                    <div class="form-group">
                        <label for="paud">Paud</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="paud_ya" name="paud" value="1"
                                    class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['paud'] == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="paud_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="paud_tidak" name="paud" value="0"
                                    class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['paud'] == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="paud_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="koperasi">Koperasi</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input hx-trigger="click" hx-post="/dawis/isKoperasi/1" hx-swap="innerHtml"
                                    hx-target="#jenisKoperasi" type="radio" id="koperasi_ya" name="koperasi"
                                    value="1" class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['koperasi'] == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="koperasi_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input hx-trigger="click" hx-post="/dawis/isKoperasi/0" hx-swap="innerHtml"
                                    hx-target="#jenisKoperasi" type="radio" id="koperasi_tidak" name="koperasi"
                                    value="0" class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['koperasi'] == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="koperasi_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div id="jenisKoperasi" hx-swap="innerHtml" hx-trigger="load"
                        hx-post="{{ $dawisSession && $dawisSession['koperasi'] == '1' ? '/dawis/isKoperasi/1' : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="berkebutuhan_khusus">Berkebutuhan Khusus</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="berkebutuhan_khusus_ya" name="berkebutuhan_khusus"
                                    value="1" class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['berkebutuhan_khusus'] == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="berkebutuhan_khusus_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="berkebutuhan_khusus_tidak" name="berkebutuhan_khusus"
                                    value="0" class="custom-control-input" required
                                    {{ $dawisSession && $dawisSession['berkebutuhan_khusus'] == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="berkebutuhan_khusus_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <a href="/warga" type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                <button type="submit" class="btn btn-primary">Selanjutnya</a>
            </div>
        </form>
    </div>
@endsection
