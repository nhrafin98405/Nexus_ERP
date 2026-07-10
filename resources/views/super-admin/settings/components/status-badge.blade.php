@php

    $status = strtolower($status ?? 'inactive');

    $badges = [
        'active' => 'success',
        'inactive' => 'secondary',
        'pending' => 'warning',
        'approved' => 'success',
        'rejected' => 'danger',
        'blocked' => 'danger',
        'draft' => 'secondary',
    ];

    $color = $badges[$status] ?? 'secondary';

@endphp

<span class="badge bg-{{ $color }}">

    {{ ucfirst($status) }}

</span>