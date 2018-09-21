<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'blog_id', 'comment_body'
    ];

    public $timestamps = false;
    
    public function blog(){
        return $this->belongsTo('App\Blog');
    }
}
