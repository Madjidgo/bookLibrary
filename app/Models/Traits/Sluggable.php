<?php  

namespace App\Models\Traits;

trait Sluggable
{
	
	protected static function bootSluggable()
	{
		
	   
	    static::creating(function($book){
	    	$book->slug = str_slug($book->title);
	    });
	}
}