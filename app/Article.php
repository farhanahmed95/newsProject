<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function comments()
    {
        return $this->hasMany('\App\Comment');
    }

    public function getDate()
    {
    	return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->published_at)->diffForHumans();
    }
}
