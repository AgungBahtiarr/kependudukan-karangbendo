@fragment('add-dawis')
    @can('create_dawis')
        <a href="/dawis/create/{{$nik}}" class="btn btn-success btn-sm mr-2 my-1 edit-btn">
            <i class="ri-edit-2-line"></i>
            Tambah Dawis
        </a>
    @endcan
@endfragment
