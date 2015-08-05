<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class Article extends Model
{
    //
    protected $fillable = [
    	'title',
    	'body',
    	'published_at'
    ];

    protected $dates = ['published_at'];
    
    //scopeNameOfScope
    public function scopePublished($query)
    {	
    	$query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query)
    {	
    	$query->where('published_at', '>', Carbon::now());
    }

    // setNameAttribute
    public function setPublishedAtAttribute($date){

    	if(Input::get('published_at') >= Carbon::now())
    	{
    		$this->attributes['published_at'] = Carbon::parse($date);	
    	}
    	else
    	{
    		$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    	}

    }
}
