<div class="d-flex justify-content-between align-items-center mb-3">

    <div>

        <h5 class="mb-0">
            {{ $title }}
        </h5>

        @isset($description)

            <small class="text-muted">
                {{ $description }}
            </small>

        @endisset

    </div>


    @isset($button)

        {!! $button !!}

    @endisset

</div>