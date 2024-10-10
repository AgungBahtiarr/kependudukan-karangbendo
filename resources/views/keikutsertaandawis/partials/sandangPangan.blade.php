@fragment('sandangPangan')
    <div class="form-group">
        <label for="pangan">Pangan</label>
        <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="pangan_ya" name="pangan" value="1" class="custom-control-input" required
                    {{ $dawisSession && $dawisSession['pangan'] == '1' ? 'checked' : '' }}>
                <label class="custom-control-label" for="pangan_ya"> Ya </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="pangan_tidak" name="pangan" value="0" class="custom-control-input" required
                    {{ $dawisSession && $dawisSession['pangan'] == '0' ? 'checked' : '' }}>
                <label class="custom-control-label" for="pangan_tidak"> Tidak </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="sandang">Sandang</label>
        <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="sandang_ya" name="sandang" value="1" class="custom-control-input" required
                    {{ $dawisSession && $dawisSession['sandang'] == '1' ? 'checked' : '' }}>
                <label class="custom-control-label" for="sandang_ya"> Ya </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="sandang_tidak" name="sandang" value="0" class="custom-control-input" required
                    {{ $dawisSession && $dawisSession['sandang'] == '0' ? 'checked' : '' }}>
                <label class="custom-control-label" for="sandang_tidak"> Tidak </label>
            </div>
        </div>
    </div>
@endfragment
