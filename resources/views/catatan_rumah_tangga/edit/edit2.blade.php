@fragment('detail-1')
    <form action={{ route('cargas.update2') }} method="POST">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{ $carga->id }}">



        <div class="content-item mb-3">
            <div class="form-group">
                <label for="id_makanan_pokok">Jenis Makanan Pokok</label>
                <select class="form-control" name="id_makanan_pokok" required>

                    @foreach ($makanans as $makan)
                        <option value={{ $makan->id }} {{ $carga->id_makanan_pokok == $makan->id ? 'selected' : '' }}>
                            {{ $carga->makanan_pokok->nama_makanan_pokok }}</option>
                    @endforeach

                </select>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="menempel_stiker_p4k">Menempel Stiker P4K</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="menempel_stiker_p4k_ya" name="menempel_stiker_p4k" value="1"
                            {{ $carga->menempel_stiker_p4k == '1' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="menempel_stiker_p4k_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="menempel_stiker_p4k_tidak" name="menempel_stiker_p4k" value="0"
                            {{ $carga->menempel_stiker_p4k == '0' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="menempel_stiker_p4k_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="aktivitas_up2k">Aktivitas UP2K</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="aktivitas_up2k_ya" name="aktivitas_up2k" value="1"
                            {{ $carga->aktivitas_up2k == '1' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="aktivitas_up2k_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="aktivitas_up2k_tidak" name="aktivitas_up2k" value="0"
                            {{ $carga->aktivitas_up2k == '0' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="aktivitas_up2k_tidak"> Tidak </label>
                    </div>
                </div>

            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="jenis_up2k">Jenis UP2K</label>
                <input type="text" name="jenis_up2k" class="form-control" required value={{ $carga->jenis_up2k }}>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="usaha_kesehatan_lingkungan">Usaha Kesehatan Lingkungan</label>

                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="usaha_kesehatan_lingkungan_ya" name="usaha_kesehatan_lingkungan"
                            value="1" {{ $carga->usaha_kesehatan_lingkungan == '1' ? 'checked' : '' }}
                            class="custom-control-input" required>
                        <label class="custom-control-label" for="usaha_kesehatan_lingkungan_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="usaha_kesehatan_lingkungan_tidak" name="usaha_kesehatan_lingkungan"
                            value="0" {{ $carga->usaha_kesehatan_lingkungan == '0' ? 'checked' : '' }}
                            class="custom-control-input" required>
                        <label class="custom-control-label" for="usaha_kesehatan_lingkungan_tidak"> Tidak
                        </label>
                    </div>
                </div>


            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="pemanfaatan_pekarangan">Pemanfaatan Pekarangan</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="pemanfaatan_pekarangan_ya" name="pemanfaatan_pekarangan" value="1"
                            class="custom-control-input" {{ $carga->pemanfaatan_pekarangan == '1' ? 'checked' : '' }}
                            required>
                        <label class="custom-control-label" for="pemanfaatan_pekarangan_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="pemanfaatan_pekarangan_tidak" name="pemanfaatan_pekarangan" value="0"
                            class="custom-control-input" {{ $carga->pemanfaatan_pekarangan == '0' ? 'checked' : '' }}
                            required>
                        <label class="custom-control-label" for="pemanfaatan_pekarangan_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="industri_rumah_tangga">Industri Rumah Tangga</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="industri_rumah_tangga_ya" name="industri_rumah_tangga" value="1"
                            class="custom-control-input" {{ $carga->industri_rumah_tangga == '1' ? 'checked' : '' }}
                            required>
                        <label class="custom-control-label" for="industri_rumah_tangga_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="industri_rumah_tangga_tidak" name="industri_rumah_tangga"
                            value="0" class="custom-control-input"
                            {{ $carga->industri_rumah_tangga == '0' ? 'checked' : '' }} required>
                        <label class="custom-control-label" for="industri_rumah_tangga_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="kerja_bakti">Kerja Bakti</label>

                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="kerja_bakti_ya" name="kerja_bakti" value="1"
                            class="custom-control-input" {{ $carga->kerja_bakti == '1' ? 'checked' : '' }} required>
                        <label class="custom-control-label" for="kerja_bakti_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="kerja_bakti_tidak" name="kerja_bakti" value="0"
                            class="custom-control-input" {{ $carga->kerja_bakti == '0' ? 'checked' : '' }} required>
                        <label class="custom-control-label" for="kerja_bakti_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <a href="{{route("cargas.show", $carga->id)}}" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</a>
        </div>

    </form>
@endfragment
