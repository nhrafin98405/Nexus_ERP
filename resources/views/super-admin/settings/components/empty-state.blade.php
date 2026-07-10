<div class="text-center py-5">

    <i class="{{ $icon ?? 'bx bx-folder-open' }}"
       style="font-size: 60px;"></i>

    <h5 class="mt-3">
        {{ $title ?? 'No Data Found' }}
    </h5>

    <p class="text-muted mb-4">
        {{ $description ?? 'There are no records available.' }}
    </p>

    @isset($button)

        {!! $button !!}

    @endisset

</div>