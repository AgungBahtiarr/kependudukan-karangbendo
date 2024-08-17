@fragment('pendidikan')
    <div class="mt-2">
        <form action="">
            <select class="form-control" name="filterPendidikan">
                @foreach ($pendidikan as $item)
                    <option value={{ $item->id }}>{{ $item->nama_pendidikan }}</option>
                @endforeach
            </select>

            <div class="flex justify-end mt-2">
                <button class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
@endfragment


@fragment('agama')
    <div class="mt-2">
        <form action="">
            <select class="form-control" name="filterAgama">
                @foreach ($agama as $item)
                    <option value={{ $item->id }}>{{ $item->nama_agama }}</option>
                @endforeach
            </select>

            <div class="flex justify-end mt-2">
                <button class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
@endfragment


@fragment('pekerjaan')
    <div class="mt-2">
        <form action="">
            <select class="form-control" name="filterPekerjaan">
                @foreach ($pekerjaan as $item)
                    <option value={{ $item->id }}>{{ $item->nama_pekerjaan }}</option>
                @endforeach
            </select>

            <div class="flex justify-end mt-2">
                <button class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
@endfragment

@fragment('perkawinan')
    <div class="mt-2">
        <form action="">
            <select class="form-control" name="filterPerkawinan">
                @foreach ($perkawinan as $item)
                    <option value={{ $item->id }}>{{ $item->nama_status_kawin }}</option>
                @endforeach
            </select>

            <div class="flex justify-end mt-2">
                <button class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
@endfragment
