@fragment('jenisKelompok')
    <div class="form-group">
        <label for="jenis_kelompok_belajar">Jenis Kelompok Belajar</label>
        <select class="form-control" name="id_jenis_kelompok_belajar" required>
            <option selected disabled>Pilih Jenis Kelompok Belajar</option>
            @foreach ($kelompokBelajars as $kelompokBelajar)
                <option value={{ $kelompokBelajar->id }}>
                    {{ $kelompokBelajar->nama_kelompok_belajar }}
                </option>
            @endforeach
        </select>
    </div>
@endfragment


@fragment('jenisKb')
    <div class="form-group">
        <label for="jenis_kb">Jenis KB</label>
        <input type="text" name="jenis_kb" class="form-control" required
            value={{ $dawisSession ? $dawisSession['jenis_kb'] : '' }}>
    </div>
@endfragment


@fragment('frekPos')
    <div class="form-group">
        <label for="frekuensi_posyandu">Frekuensi Posyandu</label>
        <input type="number" min="1" max="1" name="frekuensi_posyandu" class="form-control" required
            value={{ $dawisSession ? $dawisSession['frekuensi_posyandu'] : '' }}>
    </div>
@endfragment

@fragment('jenisKoperasi')
    <div class="form-group">
        <label for="jenis_koperasi">Jenis Koperasi</label>
        <input type="text" name="jenis_koperasi" class="form-control" required
            value={{ $dawisSession ? $dawisSession['jenis_koperasi'] : '' }}>
    </div>
@endfragment
