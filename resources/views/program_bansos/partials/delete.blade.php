@fragment('delete')
    <a class="btn btn-danger btn-sm mr-2 my-1 edit-btn" hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
        hx-delete="/program-bansos/delete/{{ $program->id }}"><i class="ri-delete-bin-2-line"></i>Delete</a>
@endfragment
