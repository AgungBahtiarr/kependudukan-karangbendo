@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Catatan Rumah Tangga</h1>


        {{-- <div class="my-4   w-72 flex justify-around items-center">
            <a href="" class="bg-[#cfdfe3] py-3 px-2 rounded-sm">Informasi Umum</a>
            <a href="">Alamat</a>
        </div> --}}


        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('cargas.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="nkk">No Kartu Keluarga</label>
                        <input type="text" name="nkk" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label for="nkk_inang">Nomor Kartu Keluarga Inang</label>
                        <input type="text" name="nkk_inang" class="form-control" required>
                    </div>


                </div>



                <div class="grid grid-cols-4 gap-4">
                    <div class="form-group">
                        <label for="kriteria_rumah">Kriteria Rumah</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kriteria_rumah_ya" name="kriteria_rumah" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="kriteria_rumah_ya"> Layak Huni </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kriteria_rumah_tidak" name="kriteria_rumah" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="kriteria_rumah_tidak"> Tidak Layak Huni </label>
                            </div>
                        </div>
                    </div>






                    <div class="form-group">
                        <label for="ada_tempat_sampah">Ada Tempat Sampah</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tempat_sampah_ya" name="ada_tempat_sampah" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="tempat_sampah_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tempat_sampah_tidak" name="ada_tempat_sampah" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="tempat_sampah_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="ada_saluran_pembuangan_limbah">Ada Saluran Pembuangan Limbah</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="limbah_ya" name="ada_saluran_pembuangan_limbah" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="limbah_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="limbah_tidak" name="ada_saluran_pembuangan_limbah" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="limbah_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="satu_rumah_satu_kk">Satu Rumah Satu Kartu Keluarga</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="satu_kk_ya" name="satu_rumah_satu_kk" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="satu_kk_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="satu_kk_tidak" name="satu_rumah_satu_kk" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="satu_kk_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="id_sumber_air">Sumber Air</label>
                        <select class="form-control" name="id_sumber_air">
                            <option selected>Pilih Jenis Sumber Air</option>
                            @foreach ($sumbers as $sumber)
                                <option value={{ $sumber->id }}>{{ $sumber->nama_sumber_air }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_makanan_pokok">Jenis Makanan Pokok</label>
                        <select class="form-control" name="id_makanan_pokok">
                            <option selected>Pilih Jenis Makanan Pokok</option>
                            @foreach ($makanans as $makanan)
                                <option value={{ $makanan->id }}>{{ $makanan->nama_makanan_pokok }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="jumlah_balita">Jumlah Balita</label>
                        <input type="number" name="jumlah_balita" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label for="jumlah_pus">Jumlah Pria Usaha Sosial</label>
                        <input type="number" name="jumlah_pus" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_wus">Jumlah Wanita Usaha Sosial</label>
                        <input type="number" name="jumlah_wus" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_ibu_hamil">Jumlah Ibu Hamil</label>
                        <input type="number" name="jumlah_ibu_hamil" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_ibuta">Jumlah Ibu Rumah Tangga</label>
                        <input type="number" name="jumlah_ibuta" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label for="jumlah_ibu_menyusui">Jumlah Ibu Menyusui</label>
                        <input type="number" name="jumlah_ibu_menyusui" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_lansia">Jumlah Lansia</label>
                        <input type="number" name="jumlah_lansia" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_jamban_keluarga">Jumlah Jamban Keluarga</label>
                        <input type="number" name="jumlah_jamban_keluarga" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="menempel_stiker_p4K">Menempel Stiker P4K</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="menempel_stiker_p4K_ya" name="menempel_stiker_p4K" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="menempel_stiker_p4K_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="menempel_stiker_p4K_tidak" name="menempel_stiker_p4K"
                                    value="0" class="custom-control-input">
                                <label class="custom-control-label" for="menempel_stiker_p4K_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="aktifitas_UP2K">Aktifitas UP2K</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="aktifitas_UP2K_ya" name="aktifitas_UP2K" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="aktifitas_UP2K_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="aktifitas_UP2K_tidak" name="aktifitas_UP2K" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="aktifitas_UP2K_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="jenis_up2k">Jenis UP2K</label>
                    <input type="text" name="jenis_up2k" class="form-control" required>
                </div>

                <div class="grid grid-cols-4 gap-4">
                    <div class="form-group">
                        <label for="usaha_kesehatan_lingkungan">Usaha Kesehatan Lingkungan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="usaha_kesehatan_lingkungan_ya" name="usaha_kesehatan_lingkungan"
                                    value="1" class="custom-control-input">
                                <label class="custom-control-label" for="usaha_kesehatan_lingkungan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="usaha_kesehatan_lingkungan_tidak" name="usaha_kesehatan_lingkungan"
                                    value="0" class="custom-control-input">
                                <label class="custom-control-label" for="usaha_kesehatan_lingkungan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="pemanfaatan_pekarangan">Pemanfaatan Pekarangan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pemanfaatan_pekarangan_ya" name="pemanfaatan_pekarangan"
                                    value="1" class="custom-control-input">
                                <label class="custom-control-label" for="pemanfaatan_pekarangan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pemanfaatan_pekarangan_tidak" name="pemanfaatan_pekarangan"
                                    value="0" class="custom-control-input">
                                <label class="custom-control-label" for="pemanfaatan_pekarangan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="industri_rumah_tangga">Industri Rumah Tangga</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="industri_rumah_tangga_ya" name="industri_rumah_tangga"
                                    value="1" class="custom-control-input">
                                <label class="custom-control-label" for="industri_rumah_tangga_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="industri_rumah_tangga_tidak" name="industri_rumah_tangga"
                                    value="0" class="custom-control-input">
                                <label class="custom-control-label" for="industri_rumah_tangga_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="kerja_bakti">Kerja Bakti</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kerja_bakti_ya" name="kerja_bakti" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="kerja_bakti_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kerja_bakti_tidak" name="kerja_bakti" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="kerja_bakti_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="modal-footer">
                    <a href="/warga" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Selanjutnya</a>
                </div>
            </form>
        </div>
    </div>
@endsection
