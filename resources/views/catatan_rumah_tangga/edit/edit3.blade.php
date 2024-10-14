@fragment('detail-3')
    <form action={{ route('cargas.update3') }} method="POST">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value={{ $carga->id }}>
        <div class="form-group">
            <label for="jumlah_balita">Jumlah Balita</label>
            <input type="number" name="jumlah_balita" class="form-control" required value={{ $carga->jumlah_balita }}>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="jumlah_pus">Jumlah Pasangan Usia Subur</label>
                <input type="number" name="jumlah_pus" class="form-control" required value={{ $carga->jumlah_pus }}>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="jumlah_wus">Jumlah Wanita Usia Subur</label>
                <input type="number" name="jumlah_wus" class="form-control" required value={{ $carga->jumlah_wus }}>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="jumlah_ibu_hamil">Jumlah Ibu Hamil</label>
                <input type="number" name="jumlah_ibu_hamil" class="form-control" required
                    value={{ $carga->jumlah_ibu_hamil }}>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="jumlah_ibu_menyusui">Jumlah Ibu Menyusui</label>
                <input type="number" name="jumlah_ibu_menyusui" class="form-control" required
                    value={{ $carga->jumlah_ibu_menyusui }}>
            </div>
        </div>
        <div class="form-group">
            <label for="jumlah_buta_baca">Jumlah Buta Baca</label>
            <input type="number" min="0" name="jumlah_buta_baca" class="form-control" required
                value="{{ $carga->jumlah_buta_baca }}">
        </div>

        <div class="form-group">
            <label for="jumlah_buta_tulis">Jumlah Buta Tulis</label>
            <input type="number" min="0" name="jumlah_buta_tulis" class="form-control" required
                value={{ $carga->jumlah_buta_tulis }}>
        </div>
        <div class="form-group">
            <label for="jumlah_buta_hitung">Jumlah Buta Hitung</label>
            <input type="number" min="0" name="jumlah_buta_hitung" class="form-control" required
                value={{ $carga->jumlah_buta_hitung }}>
        </div>
        <div class="form-group">
            <label for="jumlah_berkebutuhan_khusus">Jumlah Berkebutuhan Khusus</label>
            <input type="number" min="0" name="jumlah_berkebutuhan_khusus" class="form-control" required
                value={{ $carga->jumlah_berkebutuhan_khusus }}>
        </div>

        <div class="form-group">
            <label for="jumlah_lansia">Jumlah Lansia</label>
            <input type="number" name="jumlah_lansia" class="form-control" required value={{ $carga->jumlah_lansia }}>
        </div>



        <div class="modal-footer">
            <a href="{{ route('cargas.show', $carga->id) }}" type="button" class="btn btn-secondary"
                data-dismiss="modal">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</a>
        </div>
    </form>
@endfragment
