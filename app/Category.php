<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'user_id'
    ];

    public function posts()
    {
        return $this->hasMany('Posts');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
