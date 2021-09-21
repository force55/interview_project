<!-- Modal -->

<div class="modal fade" id="deleteModalConfirm" tabindex="-1" aria-labelledby="deleteModalConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                The post with title <span id="name_post"></span> will be deleted
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form id="form_delete" method="POST" action="{{ route('delete_post','link_here') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-post-modal">Delete!</button>
                </form>
            </div>
        </div>
    </div>
</div>
