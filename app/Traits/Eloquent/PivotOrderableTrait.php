<?php

namespace App\Traits\Eloquent;

use Illuminate\Database\Eloquent\Builder;

trait PivotOrderableTrait
{
    public function scopeOrderByPivot(Builder $builder, $column = 'created_at', $order = 'desc')
    {
        return $builder->orderBy('pivot_' . $column, $order);
    }
}