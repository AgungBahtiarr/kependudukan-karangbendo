@fragment('log')
    <a class="btn bg-indigo-500 text-white btn-sm mr-2 my-1 edit-btn" hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
        hx-post={{ route('trabas.store', $bansos->id, false) }}><i class="ri-edit-2-line"></i>Log</a>
@endfragment
