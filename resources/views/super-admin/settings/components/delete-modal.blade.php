<div class="modal fade"
     id="{{ $id }}"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Confirm Delete
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                {{ $message ?? 'Are you sure you want to delete this record?' }}

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                    Cancel

                </button>

                <form action="{{ $action }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="button"
        class="btn btn-sm btn-light"
        data-bs-toggle="modal"
        data-bs-target="#deleteRole{{ $role->id }}">
    Delete
</button>

                </form>

            </div>

        </div>

    </div>

</div>