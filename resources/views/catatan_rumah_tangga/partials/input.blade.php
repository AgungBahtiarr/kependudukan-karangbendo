@fragment('nkkInang')
    <div class="form-group">
        <label for="nkk_inang">Nomor Kartu Keluarga Induk</label>
        <input type="text" minlength="16" maxlength="16" name="nkk_inang" class="form-control" required
            value={{ $cargasSession ? $cargasSession['nkk_inang'] : '' }}>
    </div>
@endfragment


