@fragment('jenisKbEdit')
    <div class="form-group">
        <label for="jenis_kb">Jenis KB</label>
        <input type="text" name="jenis_kb" class="form-control" required
            value={{ $dawis->jenis_kb ? $dawis->jenis_kb : '' }}>
    </div>
@endfragment

