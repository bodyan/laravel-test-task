<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function category()
    {
        return $this->belongsTo('Category');
    }    
}
