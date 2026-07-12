<?php

namespace App\Services\Branch;

use App\Models\Branch;

class BranchCodeGenerator
{
    public static function generate(): string
    {
        $lastBranch = Branch::withTrashed()
            ->latest('id')
            ->first();

        $number = $lastBranch
            ? ((int) substr($lastBranch->code, 4)) + 1
            : 1;

        return 'BRN-' . str_pad($number, 5, '0', STR_PAD_LEFT);
    }
}