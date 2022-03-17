<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder;

trait GeneralTrait
{
    public function scopeFilter(Builder $query, $field, $value)
    {
        $filtrable=collect($this->canFilter);
    

        if (is_null($field) || !$filtrable->contains($field)) {
            return $query;
        }
        return $query->where($field, $value);
    }
}
