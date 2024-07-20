@fragment('edit')
    <form action={{route("industries.update")}} method="POST">
        @csrf
        @method('patch')

        <input type="hidden" name="id" value={{ $industri->id }}>
        <div class="content-item mb-3">
            <div class="form-group">
                <label for="nama_usaha">Nama Usaha</label>
                <input type="text" name="nama_usaha" class="form-control" required value={{ $industri->nama_usaha }}>
            </div>
        </div>
        <div class="content-item mb-3">

            <div class="form-group">
                <label for="bidang_sandang">Bidang Sandang</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="bidang_sandang_ya" name="bidang_sandang" value="1"
                            class="custom-control-input" required {{ $industri->bidang_sandang == '1' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="bidang_sandang_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="bidang_sandang_tidak" name="bidang_sandang" value="0"
                            class="custom-control-input" required {{ $industri->bidang_sandang == '0' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="bidang_sandang_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="bidang_pangan">Bidang Pangan</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="bidang_pangan_ya" name="bidang_pangan" value="1"
                            class="custom-control-input" required {{ $industri->bidang_pangan == '1' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="bidang_pangan_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="bidang_pangan_tidak" name="bidang_pangan" value="0"
                            class="custom-control-input" required {{ $industri->bidang_pangan == '0' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="bidang_pangan_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="bidang_jasa">Bidang Jasa</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="bidang_jasa_ya" name="bidang_jasa" value="1"
                            class="custom-control-input" required {{ $industri->bidang_jasa == '1' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="bidang_jasa_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="bidang_jasa_tidak" name="bidang_jasa" value="0"
                            class="custom-control-input" required {{ $industri->bidang_jasa == '0' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="bidang_jasa_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <a href="/industries/detail/{{ $industri->id }}/{{ $industri->nkk }}" type="button" class="btn btn-secondary"
                data-dismiss="modal">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</a>
        </div>
    </form>
@endfragment
