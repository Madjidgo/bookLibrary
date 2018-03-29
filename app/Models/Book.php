<?php

namespace App\Models;


use App\Models\Traits\{SlugRoutable,Sluggable};
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	
	use SlugRoutable,Sluggable;

    protected $fillable = ['title', 'resume','author','category','borrow'];


	protected static function boot()
	{
		parent::boot();
		static::updating(function($book){
			$book->slug = str_slug($book->title);
			});
	}
			
}
	

