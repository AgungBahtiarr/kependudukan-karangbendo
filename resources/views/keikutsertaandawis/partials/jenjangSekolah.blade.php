@fragment('jenjangSekolah')
    <div class="form-group">
        <label for="jenjang_sekolah">Jenjang Putus Sekolah</label>
        <select class="form-control" name="id_jenjang_sekolah" required>
            <option value="" selected disabled>Pilih Jenjang Sekolah</option>
            @foreach ($jenjangSekolah as $item)
                <option value={{ $item->id }}>
                    {{ $item->jenjang_sekolah }}
                </option>
            @endforeach
        </select>
    </div>
@endfragment
