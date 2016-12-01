<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use Sluggable;

    protected $fillable = ['name', 'description', 'price', 'category_id', 'slug'];
    // protected $fillable = ['name', 'description', 'price', 'category_id'];

    // public function sluggable()
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'name'
    //         ]
    //     ];
    // }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    //relaciones
    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function images()
    {
      return $this->hasMany('App\Image');
    }

    //scopes
    public function scopeVisibles($query)
    {
      $query->where('visible', 1);
    }
}
