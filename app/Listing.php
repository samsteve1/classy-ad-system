<?php

namespace App;

use App\User;
use App\Category;
use App\Area;
use App\Traits\Eloquent\OrderableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Listing extends Model
{
    use OrderableTrait, SoftDeletes;

    public function scopeIsLive(Builder $builder)
    {
        return $builder->where('live', true);
    }


    public function scopeIsNotLive(Builder $builder)
    {
        return $builder->where('live', false);
    }

    public function scopeFromCategory(Builder $builder, Category $category)
    {
        return $builder->where('category_id', $category->id);
    }

    public function scopeInArea(Builder $builder, Area $area)
    {
        return $builder->whereIn('area_id', array_merge([$area->id], $area->descendants->pluck('id')->toArray()
        
        )); 
    }


    public function live()
    {
        return $this->live;
    }
    public function cost()
    {
        return $this->category->price;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    
}
