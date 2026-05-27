<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Schema;

trait UsesTableFillable
{
    protected function nonFillableColumns(): array
    {
        return [];
    }

    public function getFillable()
    {
        return once(function () {
            return array_values(array_diff(
                Schema::getColumnListing($this->getTable()),
                array_merge(['id'], $this->nonFillableColumns())
            ));
        });
    }
}
