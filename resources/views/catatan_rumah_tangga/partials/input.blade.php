@fragment('nkkInang')
    <div class="form-group">
        <label for="nkk_inang">Nomor Kartu Keluarga Inang</label>
        <input type="text" name="nkk_inang" class="form-control" required
            value={{ $cargasSession ? $cargasSession['nkk_inang'] : '' }}>
    </div>
@endfragment


