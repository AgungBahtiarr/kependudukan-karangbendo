@fragment('jenisUp2k')
    <div class="form-group">
        <label for="jenis_up2k">Jenis UP2K</label>
        <input type="text" name="jenis_up2k" class="form-control" required
            value={{ $cargasSession ? $cargasSession['jenis_up2k'] : '' }}>
    </div>
@endfragment