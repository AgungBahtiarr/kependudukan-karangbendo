@fragment('detail-1')
    <form action={{ route('cargas.update1') }} method="POST">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{ $carga->id }}">

        <div class="content-item mb-3">
            <h2>Nomor KK</h2>
            <input type="text" class="form-control" value={{ $carga->nkk }} name="nkk">
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="kriteria_rumah">Kriteria Rumah</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="kriteria_rumah_ya" name="kriteria_rumah" value="1"
                            class="custom-control-input" {{ $carga->kriteria_rumah == '1' ? 'checked' : '' }} required>
                        <label class="custom-control-label" for="kriteria_rumah_ya"> Layak Huni </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="kriteria_rumah_tidak" name="kriteria_rumah" value="0"
                            {{ $carga->kriteria_rumah == '0' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="kriteria_rumah_tidak"> Tidak Layak Huni </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="jumlah_jamban_keluarga">Jumlah Jamban Keluarga</label>
                <input type="number" name="jumlah_jamban_keluarga" class="form-control" required
                    value={{ $carga->jumlah_jamban_keluarga }}>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="id_sumber_air">Sumber Air</label>
                <select class="form-control" name="id_sumber_air" required>
                    @foreach ($sumbers as $sumber)
                        <option value={{ $sumber->id }}>{{ $sumber->nama_sumber_air }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="ada_tempat_sampah">Ada Tempat Sampah</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="tempat_sampah_ya" name="ada_tempat_sampah" value="1"
                            {{ $carga->ada_tempat_sampah == '1' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="tempat_sampah_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="tempat_sampah_tidak" name="ada_tempat_sampah" value="0"
                            {{ $carga->ada_tempat_sampah == '1' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="tempat_sampah_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="ada_saluran_pembuangan_limbah">Ada Saluran Pembuangan Limbah</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="limbah_ya" name="ada_saluran_pembuangan_limbah" value="1"
                            class="custom-control-input"
                            {{ $carga->ada_saluran_pembuangan_limbah == '1' ? 'checked' : '' }} required>
                        <label class="custom-control-label" for="limbah_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="limbah_tidak" name="ada_saluran_pembuangan_limbah" value="0"
                            class="custom-control-input"
                            {{ $carga->ada_saluran_pembuangan_limbah == '0' ? 'checked' : '' }} required>
                        <label class="custom-control-label" for="limbah_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="satu_rumah_satu_kk">Satu Rumah Satu Kartu Keluarga</label>
            <div class="form-group">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="satu_kk_ya" name="satu_rumah_satu_kk" value="1"
                        class="custom-control-input" {{ $carga->satu_rumah_satu_kk == '1' ? 'checked' : '' }} required>
                    <label class="custom-control-label" for="satu_kk_ya"> Ya </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="satu_kk_tidak" name="satu_rumah_satu_kk" value="0"
                        class="custom-control-input" {{ $carga->satu_rumah_satu_kk == '0' ? 'checked' : '' }} required>
                    <label class="custom-control-label" for="satu_kk_tidak"> Tidak </label>
                </div>
            </div>
        </div>

        <div class="content-item mb-3">
            <h2>Nomor KK Inang</h2>
            <input type="text" class="form-control" name="nkk_inang" value={{ $carga->nkk_inang }}>
        </div>

        <div class="modal-footer">
            <a href="{{ route('cargas.show', $carga->id) }}" type="button" class="btn btn-secondary"
                data-dismiss="modal">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</a>
        </div>
    </form>
@endfragment
