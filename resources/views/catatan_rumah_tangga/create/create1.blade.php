@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Catatan Rumah Tangga</h1>


        {{-- <div class="my-4   w-72 flex justify-around items-center">
            <a href="" class="bg-[#cfdfe3] py-3 px-2 rounded-sm">Informasi Umum</a>
            <a href="">Alamat</a>
        </div> --}}


        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('cargas.store1') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="nkk">No Kartu Keluarga</label>
                        <input type="text" name="nkk" class="form-control" required
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


                    @if ($cargasSession && $cargasSession['satu_rumah_satu_kk'] == 1)
                        <div id="nkkInang">
                            <div class="form-group">
                                <label for="nkk_inang">Nomor Kartu Keluarga Inang</label>
                                <input type="text" name="nkk_inang" class="form-control" required
                                    value={{ $cargasSession ? $cargasSession['nkk_inang'] : '' }}>
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
                                <option selected>Pilih Jenis Sumber Air</option>
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
