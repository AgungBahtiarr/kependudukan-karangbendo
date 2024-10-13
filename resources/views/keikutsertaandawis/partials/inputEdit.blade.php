@fragment('jenisKbEdit')
    <div class="form-group">
        <label for="jenis_kb">Jenis KB</label>
        <select class="form-control" name="jenis_kb">
            <option value="" selected disabled>Pilih jenis KB</option>
            @foreach ($jenisKb as $kb)
                <option {{ $dawis->jenis_kb == $kb ? 'selected' : '' }} value={{ $kb }}>
                    {{ $kb }}
                </option>
            @endforeach
        </select>
    </div>
@endfragment
