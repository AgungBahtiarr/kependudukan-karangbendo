@fragment('sumber-air')
    <div class="mt-2">
        <form action="">
            <select class="form-control" name="filterSumberAir">
                @foreach ($sumbers as $sumber)
                    <option value={{ $sumber->id }}>{{ $sumber->nama_sumber_air }}</option>
                @endforeach
            </select>

            <div class="flex justify-end mt-2">
                <button class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
@endfragment

@fragment('makanan-pokok')
    <div class="mt-2">
        <form action="">
            <select class="form-control" name="filterMakananPokok">
                @foreach ($makanans as $makanan)
                    <option value={{ $makanan->id }}>{{ $makanan->nama_makanan_pokok }}</option>
                @endforeach
            </select>

            <div class="flex justify-end mt-2">
                <button class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
@endfragment
