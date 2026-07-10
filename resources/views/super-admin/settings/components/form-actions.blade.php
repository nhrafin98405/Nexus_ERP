<div class="d-flex justify-content-end gap-2 mt-4">

    <a href="{{ $back ?? url()->previous() }}"
       class="btn btn-light">

        <i class="bx bx-arrow-back"></i>
        Back

    </a>


    <button type="submit"
            class="btn btn-light">

        <i class="bx bx-save"></i>

        {{ $submit ?? 'Save' }}

    </button>

</div>