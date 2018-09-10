<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    public function getComments($id)
    {
        return DB::table('comments as c')
            ->join('posts as p', 'c.posts_id', '=', 'p.id')
            ->join('users as u', 'c.user_id', '=', 'u.id')
            ->where('p.id',$id)
            ->orderBy('c.id', 'DESC')
            ->select('c.*', 'u.id', 'u.name')
            ->get();
    }
}
