@fragment('jenisKelompok')
    <div class="form-group">
        <label for="jenis_kelompok_belajar">Jenis Kelompok Belajar</label>
        <select class="form-control" name="id_jenis_kelompok_belajar" required>
            <option value="" selected disabled>Pilih Jenis Kelompok Belajar</option>
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
        {{-- <input type="text" name="jenis_kb" class="form-control" placeholder="Intra Uterine Device,Implan,Sterilisasi dll" required
            value={{ $dawisSession ? $dawisSession['jenis_kb'] : '' }}> --}}
        <select class="form-control" name="jenis_kb" required>
            <option value="" selected disabled>Pilih Jenis KB</option>
            @foreach ($jenisKb as $kb)
                <option value={{ $dawisSession ? $dawisSession['jenis_kb'] : '' }}>
                    {{ $kb }}
                </option>
            @endforeach
        </select>
    </div>
@endfragment


@fragment('frekPos')
    <div class="form-group">
        <label for="frekuensi_posyandu">Frekuensi Posyandu (Dalam 1 Tahun)</label>
        <input type="number" min="0" name="frekuensi_posyandu" class="form-control" placeholder="1,2,3" required
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
