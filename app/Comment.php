<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable = array('article_id', 'name','email','body','create_at','updated_at');

    public function article()
    {

        return $this->belongsTo('\App\Article');

    }
}
