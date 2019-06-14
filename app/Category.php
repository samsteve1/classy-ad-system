<?php

namespace App;

use App\Area;
use App\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Kalnoy\Nestedset\NodeTrait;
class Category extends Model
{
    use NodeTrait;
    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function listings()
    {
       return $this->hasMany(Listing::class);
    }

    public function scopeWithListingsInArea(Builder $builder, Area $area)
    {
        return $builder->with(['listings' => function($q) use ($area) {
            $q->isLive()->inArea($area);
        }]);
    }
}
