{{-- modal --}}
<div class="modal fade" id="delete{{ $row->id }}">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Delete Data Tag</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('admin.delete.tag') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="mb-3">
                <label for="tags" class="form-label">Tag</label>
                <P class="text-center">Yakin Mau Hapus Data <strong style="color: red">{{ $row->tags }}</strong></P>
                <input type="hidden" name="id" value="{{ $row->id }}">
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
    
    </div>
</div>