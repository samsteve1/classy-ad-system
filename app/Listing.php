<?php

namespace App;

use App\User;
use App\Category;
use App\Area;
use App\Traits\Eloquent\OrderableTrait;
use App\Traits\Eloquent\PivotOrderableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;

class Listing extends Model
{
    use OrderableTrait, PivotOrderableTrait, SoftDeletes;//, Searchable;

    protected $fillable = ['title', 'body', 'area_id', 'category_id'];

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

    public function ownedByUser(User $user)
    {
        return $this->user->id === $user->id;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function favourites()
    {
        return $this->morphToMany(User::class, 'favouriteable');
    }

    public function favouritedBy(User $user)
    {
        return $this->favourites->contains($user);
    }
    public function viewedUsers()
    {
        return $this->belongsToMany(User::class, 'user_listing_views')->withTimeStamps()->withPivot(['count']);
    }
    public function views()
    {
        return array_sum($this->viewedUsers->pluck('pivot.count')->toArray());

        //return $this->viewedUsers()->sum('count');
    }

    public function toSearchableArray()
    {
        $properties = $this->toArray();

        $properties['created_at_human'] = $this->created_at->diffForHumans();
        $properties['user'] = $this->user;
        $properties['category'] = $this->category;
        $properties['area'] = $this->area;

        return $properties;
    }
}
