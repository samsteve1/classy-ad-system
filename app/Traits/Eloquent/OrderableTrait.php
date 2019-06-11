<?php

namespace App\Traits\Eloquent;

use Illuminate\Database\Eloquent\Builder;
trait OrderableTrait
{
    public function scopeLatestFirst(Builder $builder)
    {
        return $builder->orderBy('created_at', 'desc');
    }
}

