@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Data Catatan Dawis</h1>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action={{route('dawis.store')}} method="POST">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" class="form-control" required value={{$nik}} @readonly(true)>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="kb flex flex-col">
                        <div class="form-group">
                            <label for="akseptor_kb">Akseptor KB</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="kb_ya" name="akseptor_kb" value="1"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="kb_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="kb_tidak" name="akseptor_kb" value="0"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="kb_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kb">Jenis KB</label>
                            <input type="text" name="jenis_kb" class="form-control">
                        </div>
                    </div>

                    <div class="posyandu flex flex-col">
                        <div class="form-group">
                            <label for="posyandu">Posyandu</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="posyandu_ya" name="posyandu" value="1"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="posyandu_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="posyandu_tidak" name="posyandu" value="0"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="posyandu_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="frekuensi_posyandu">Frekuensi Posyandu</label>
                            <input type="text" name="frekuensi_posyandu" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="grid grid-rows-2-2">
                        <div class="form-group">
                            <label for="binabalita">Bina Keluarga Balita</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="binabalita_ya" name="bina_keluarga_balita" value="1"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="binabalita_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="binabalita_tidak" name="bina_keluarga_balita" value="0"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="binabalita_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tabungan">Memiliki Tabungan</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="tabungan_ya" name="memiliki_tabungan" value="1"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="tabungan_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="tabungan_tidak" name="memiliki_tabungan" value="0"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="tabungan_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="kelompok_belajar">
                        <div class="form-group">
                            <label for="kelompok_belajar">Kelompok Belajar</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="kelompok_belajar_ya" name="kelompok_belajar"
                                        value="1" class="custom-control-input">
                                    <label class="custom-control-label" for="kelompok_belajar_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="kelompok_belajar_tidak" name="kelompok_belajar"
                                        value="0" class="custom-control-input">
                                    <label class="custom-control-label" for="kelompok_belajar_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelompok_belajar">Jenis Kelompok Belajar</label>
                            <select class="form-control" name="id_jenis_kelompok_belajar">
                                <option selected>Pilih Jenis Kelompok Belajar</option>
                                <option value="">Tidak Ikut Kelompok Belajar</option>
                                @foreach ($kelompokBelajars as $kelompokBelajar)
                                    <option value={{ $kelompokBelajar->id }}>{{ $kelompokBelajar->nama_kelompok_belajar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <div class="form-group">
                            <label for="paud">Paud</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="paud_ya" name="paud" value="1"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="paud_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="paud_tidak" name="paud" value="0"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="paud_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="berkebutuhan_khusus">Berkebutuhan Khusus</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="berkebutuhan_khusus_ya" name="berkebutuhan_khusus"
                                        value="1" class="custom-control-input">
                                    <label class="custom-control-label" for="berkebutuhan_khusus_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="berkebutuhan_khusus_tidak" name="berkebutuhan_khusus"
                                        value="0" class="custom-control-input">
                                    <label class="custom-control-label" for="berkebutuhan_khusus_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="flex flex-col">
                        <div class="form-group">
                            <label for="koperasi">Koperasi</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="koperasi_ya" name="koperasi" value="1"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="koperasi_ya"> Ya </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="koperasi_tidak" name="koperasi" value="0"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="koperasi_tidak"> Tidak </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="jenis_koperasi">Jenis Koperasi</label>
                            <input type="text" name="jenis_koperasi" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="grid grid-cols-4 gap-4 mt-4">
                    <div class="form-group">
                        <label for="penghayatan_pengamalan_pancasila">Pengamalan Pancasila</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="penghayatan_pengamalan_pancasila_ya" name="penghayatan_pengamalan_pancasila" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="penghayatan_pengamalan_pancasila_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="penghayatan_pengamalan_pancasila_tidak" name="penghayatan_pengamalan_pancasila" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="penghayatan_pengamalan_pancasila_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gotong_royong">Gotong Royong</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="gotong_royong_ya" name="gotong_royong" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="gotong_royong_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="gotong_royong_tidak" name="gotong_royong" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="gotong_royong_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="pendidikan_keterampilan">Pendidikan Keterampilan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pendidikan_keterampilan_ya" name="pendidikan_keterampilan" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="pendidikan_keterampilan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pendidikan_keterampilan_tidak" name="pendidikan_keterampilan" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="pendidikan_keterampilan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kehidupan_berteknologi">Kehidupan Berteknologi</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kehidupan_berteknologi_ya" name="kehidupan_berteknologi" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="kehidupan_berteknologi_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kehidupan_berteknologi_tidak" name="kehidupan_berteknologi" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="kehidupan_berteknologi_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="grid grid-cols-4 gap-4 mt-4">
                    <div class="form-group">
                        <label for="pangan">Pangan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pangan_ya" name="pangan" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="pangan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pangan_tidak" name="pangan" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="pangan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sandang">Sandang</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sandang_ya" name="sandang" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="sandang_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sandang_tidak" name="sandang" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="sandang_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kegiatan_kesehatan">Kegiatan Kesehatan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kegiatan_kesehatan_ya" name="kegiatan_kesehatan" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="kegiatan_kesehatan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kegiatan_kesehatan_tidak" name="kegiatan_kesehatan" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="kegiatan_kesehatan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="perencanaan_kesehatan">Perencanaan Kesehatan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="perencanaan_kesehatan_ya" name="perencanaan_kesehatan" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="perencanaan_kesehatan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="perencanaan_kesehatan_tidak" name="perencanaan_kesehatan" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="perencanaan_kesehatan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="/warga" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>
    </div>
@endsection
