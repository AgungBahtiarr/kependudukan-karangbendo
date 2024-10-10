@fragment('jenisDisabilitas')
    <div class="form-group">
        <label for="jenis_disabilitas">Jenis Disabilitas</label>
        <select class="form-control" name="id_jenis_disabilitas" required>
            <option value="" selected disabled>Pilih Jenis Disabilitas</option>
            @foreach ($jenisDisabilitas as $item)
                <option value={{ $item->id }}>
                    {{ $item->jenis_disabilitas }}
                </option>
            @endforeach
        </select>
    </div>
@endfragment
