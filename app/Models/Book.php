<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'resume','author','category','borrow'];


    /**
 * Get the route key for the model.
 *
 * @return string
 */
public function getRouteKeyName()
{
    return 'slug';
}

// method boot
protected static function boot()
{
    parent::boot();

    // pendant la creation met le slug
    static::creating(function($book){
    	$book->slug = str_slug($book->title);
    });
}

}
