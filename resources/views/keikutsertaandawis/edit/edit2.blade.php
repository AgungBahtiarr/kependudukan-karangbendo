@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Edit Data Catatan Dawis</h1>

        <div class="my-4 w-96 flex justify-around items-center">
            <a href="">Informasi Umum</a>
            <a href="">Alamat</a>
            <a href="" class="bg-[#cfdfe3] py-3 px-2 rounded-sm">Catatan Dawis</a>
        </div>

        <form action={{ route('dawis.update2') }} method="POST">
            @csrf
            @method('patch')

            <input type="hidden" name="id" value={{ $dawis->id }}>
            <input type="hidden" name="nik" value={{ $nik }}>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="w-full flex flex-col gap-3 bg-white my-6 py-4 px-4 rounded-lg">

                    <div class="form-group">
                        <label for="penghayatan_pengamalan_pancasila">Pengamalan Pancasila</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="penghayatan_pengamalan_pancasila_ya"
                                    name="penghayatan_pengamalan_pancasila" value="1" class="custom-control-input"
                                    required {{ $dawis->penghayatan_pengamalan_pancasila == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="penghayatan_pengamalan_pancasila_ya"> Ya
                                </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="penghayatan_pengamalan_pancasila_tidak"
                                    name="penghayatan_pengamalan_pancasila" value="0" class="custom-control-input"
                                    required {{ $dawis->penghayatan_pengamalan_pancasila == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="penghayatan_pengamalan_pancasila_tidak"> Tidak
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gotong_royong">Gotong Royong</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="gotong_royong_ya" name="gotong_royong" value="1"
                                    class="custom-control-input" required
                                    {{ $dawis->gotong_royong == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="gotong_royong_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="gotong_royong_tidak" name="gotong_royong" value="0"
                                    class="custom-control-input" required
                                    {{ $dawis->gotong_royong == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="gotong_royong_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="pendidikan_keterampilan">Pendidikan Keterampilan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pendidikan_keterampilan_ya" name="pendidikan_keterampilan"
                                    value="1" class="custom-control-input" required
                                    {{ $dawis->pendidikan_keterampilan == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="pendidikan_keterampilan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pendidikan_keterampilan_tidak" name="pendidikan_keterampilan"
                                    value="0" class="custom-control-input" required
                                    {{ $dawis->pendidikan_keterampilan == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="pendidikan_keterampilan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="kehidupan_berkolaborasi">Kehidupan Berkolaborasi</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kehidupan_berkolaborasi_ya" name="kehidupan_berkolaborasi"
                                    value="1" class="custom-control-input" required
                                    {{ $dawis->kehidupan_berkolaborasi == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kehidupan_berkolaborasi_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kehidupan_berkolaborasi_tidak" name="kehidupan_berkolaborasi"
                                    value="0" class="custom-control-input" required
                                    {{ $dawis->kehidupan_berkolaborasi == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kehidupan_berkolaborasi_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-full flex flex-col gap-3 bg-white my-6 py-4 px-4 rounded-lg">
                    <div class="form-group">
                        <label for="pangan">Pangan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pangan_ya" name="pangan" value="1"
                                    class="custom-control-input" required {{ $dawis->pangan == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="pangan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pangan_tidak" name="pangan" value="0"
                                    class="custom-control-input" required {{ $dawis->pangan == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="pangan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sandang">Sandang</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sandang_ya" name="sandang" value="1"
                                    class="custom-control-input" required {{ $dawis->sandang == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="sandang_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sandang_tidak" name="sandang" value="0"
                                    class="custom-control-input" required {{ $dawis->sandang == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="sandang_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kegiatan_kesehatan">Kegiatan Kesehatan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kegiatan_kesehatan_ya" name="kegiatan_kesehatan"
                                    value="1" class="custom-control-input" required
                                    {{ $dawis->kegiatan_kesehatan == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kegiatan_kesehatan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kegiatan_kesehatan_tidak" name="kegiatan_kesehatan"
                                    value="0" class="custom-control-input" required
                                    {{ $dawis->kegiatan_kesehatan == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kegiatan_kesehatan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="perencanaan_kesehatan">Perencanaan Kesehatan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="perencanaan_kesehatan_ya" name="perencanaan_kesehatan"
                                    value="1" class="custom-control-input" required
                                    {{ $dawis->perencanaan_kesehatan == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="perencanaan_kesehatan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="perencanaan_kesehatan_tidak" name="perencanaan_kesehatan"
                                    value="0" class="custom-control-input" required
                                    {{ $dawis->perencanaan_kesehatan == '0' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="perencanaan_kesehatan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <a href={{ route('dawis.edit', $nik) }} type="button" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</a>
            </div>
        </form>
    </div>
@endsection