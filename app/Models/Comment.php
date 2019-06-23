<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body'
    ];

    /**
     * The comment belongs to a user
     * @return [type] [description]
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * The comment belongs to a post
     * @return [type] [description]
     */
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
