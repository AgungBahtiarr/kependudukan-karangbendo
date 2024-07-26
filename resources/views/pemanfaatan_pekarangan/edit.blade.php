@fragment('edit')
    <form action={{route("pekarangans.update")}} method="POST">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value={{$pekarangan->id}}>
        <div class="content-item mb-3">
            <div class="form-group">
                <label for="tanaman_keras">Tanaman Keras</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="tanaman_keras_ya" name="tanaman_keras" value="1"
                            {{ $pekarangan->tanaman_keras == '1' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="tanaman_keras_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="tanaman_keras_tidak" name="tanaman_keras" value="0"
                            {{ $pekarangan->tanaman_keras == '0' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="tanaman_keras_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="toga">Toga</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="toga_ya" name="toga" value="1"
                            {{ $pekarangan->toga == '1' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="toga_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="toga_tidak" name="toga" value="0"
                            {{ $pekarangan->toga == '0' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="toga_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="lumbung_hidup">Lumbung Hidup</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="lumbung_hidup_ya" name="lumbung_hidup" value="1"
                            {{ $pekarangan->lumbung_hidup == '1' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="lumbung_hidup_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="lumbung_hidup_tidak" name="lumbung_hidup" value="0"
                            {{ $pekarangan->lumbung_hidup == '0' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="lumbung_hidup_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="warung_hidup">Warung Hidup</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="warung_hidup_ya" name="warung_hidup" value="1"
                            {{ $pekarangan->warung_hidup == '1' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="warung_hidup_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="warung_hidup_tidak" name="warung_hidup" value="0"
                            {{ $pekarangan->warung_hidup == '0' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="warung_hidup_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>


        <div class="content-item mb-3">
            <div class="form-group">
                <label for="perikanan">Perikanan</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="perikanan_ya" name="perikanan" value="1"
                            {{ $pekarangan->perikanan == '1' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="perikanan_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="perikanan_tidak" name="perikanan" value="0"
                            {{ $pekarangan->perikanan == '0' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="perikanan_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>


        <div class="content-item mb-3">
            <div class="form-group">
                <label for="peternakanan">Peternakanan</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="peternakanan_ya" name="peternakan" value="1"
                            {{ $pekarangan->peternakan == '1' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="peternakanan_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="peternakanan_tidak" name="peternakan" value="0"
                            {{ $pekarangan->peternakan == '0' ? 'checked' : '' }} class="custom-control-input" required>
                        <label class="custom-control-label" for="peternakanan_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <a href="/pekarangans/detail/{{$pekarangan->id}}/{{$pekarangan->nkk}}" type="button" class="btn btn-secondary"
                data-dismiss="modal">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</a>
        </div>
    </form>
@endfragment
