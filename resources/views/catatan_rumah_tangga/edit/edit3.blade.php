@fragment('detail-3')
    <form action={{route('cargas.update3')}} method="POST">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value={{$carga->id}}>
        <div class="form-group">
            <label for="jumlah_balita">Jumlah Balita</label>
            <input type="number" name="jumlah_balita" class="form-control" required value={{ $carga->jumlah_balita }}>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="jumlah_pus">Jumlah Pria Usaha Sosial</label>
                <input type="number" name="jumlah_pus" class="form-control" required value={{ $carga->jumlah_pus }}>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="jumlah_wus">Jumlah Wanita Usaha Sosial</label>
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

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="jumlah_ibuta">Jumlah Ibu Rumah Tangga</label>
                <input type="number" name="jumlah_ibuta" class="form-control" required value={{ $carga->jumlah_ibuta }}>
            </div>
        </div>

        <div class="form-group">
            <label for="jumlah_lansia">Jumlah Lansia</label>
            <input type="number" name="jumlah_lansia" class="form-control" required value={{ $carga->jumlah_lansia }}>
        </div>

        <div class="modal-footer">
            <a href="{{route("cargas.show", $carga->id)}}" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</a>
        </div>
    </form>
@endfragment
