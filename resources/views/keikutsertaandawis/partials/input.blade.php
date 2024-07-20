@fragment('jenisKelompok')
    <div class="form-group">
        <label for="jenis_kelompok_belajar">Jenis Kelompok Belajar</label>
        <select class="form-control" name="id_jenis_kelompok_belajar" required>
            <option selected>Pilih Jenis Kelompok Belajar</option>
            @foreach ($kelompokBelajars as $kelompokBelajar)
                <option value={{ $kelompokBelajar->id }}>
                    {{ $kelompokBelajar->nama_kelompok_belajar }}
                </option>
            @endforeach
        </select>
    </div>
@endfragment
