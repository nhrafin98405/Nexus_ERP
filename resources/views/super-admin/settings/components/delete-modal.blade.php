<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-danger">

            <div class="modal-header">
                <h5 class="modal-title text-white">
                    Confirm Delete
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>
            </div>

            <div class="modal-body text-white">
                {{ $message ?? 'Are you sure you want to delete this record?' }}
            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-light"
                        data-bs-dismiss="modal">
                    Cancel
                </button>

                <form action="{{ $action }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-light">
                        <i class="bx bx-trash"></i>
                        Delete
                    </button>
                </form>

            </div>

        </div>
    </div>
</div>