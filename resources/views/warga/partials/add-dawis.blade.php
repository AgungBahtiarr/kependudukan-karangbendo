@fragment('add-dawis')
    @can('create_dawis')
        <a href="/dawis/create/{{ $nik }}" class="btn btn-light btn-sm mr-2 my-1">
            <i class="ri-add-circle-fill"></i>
            Tambah Dawis
        </a>
    @endcan
@endfragment



