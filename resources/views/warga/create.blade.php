<div class="modal fade" id="createWargaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Warga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('wargas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="no_registrasi">No Registrasi</label>
                        <input type="text" name="no_registrasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nkk">NKK</label>
                        <input type="text" name="nkk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="id_status_perkawinan">Status Perkawinan</label>
                        <select class="form-select" aria-label="Default select example" name="id_status_perkawinan">
                            <option selected>Pilih Status Perkawinan</option>
                            @foreach ($perkawinan as $kawin)
                                <option value={{ $kawin->id }}>{{ $kawin->nama_status_kawin }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_keluarga">Status Di Keluarga</label>
                        <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                            <option selected>Pilih Status Di Keluarga</option>
                            <option value="0">Anggota Keluarga</option>
                            <option value="1">Kepala Keluarga</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-select" aria-label="Default select example" name="id_agama">
                            <option selected>Pilih Agama</option>
                            @foreach ($agamas as $agama)
                                <option value={{ $agama->id }}>{{ $agama->nama_agama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat_jalan">Alamat Jalan</label>
                        <input type="text" name="alamat_jalan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" name="rt" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="text" name="rw" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <select class="form-select" aria-label="Default select example" name="id_pendidikan">
                            <option selected>Pilih Pendidikan</option>
                            @foreach ($pendidikans as $pendidikan)
                                <option value={{ $pendidikan->id }}>{{ $pendidikan->nama_pendidikan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <select class="form-select" aria-label="Default select example" name="id_pekerjaan">
                            <option selected>Pilih Pekerjaan</option>
                            @foreach ($pekerjaans as $pekerjaan)
                                <option value={{ $pekerjaan->id }}>{{ $pekerjaan->nama_pekerjaan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
