<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'user_id', 'posts_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Posts');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
