<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'topic',
        'body'
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            // Make a slug for the user ex: firstname.lastname.xx
            $slug = $maybe_slug = strtolower(str_slug($model->topic));
            $next = 2;
            while (Post::where('slug', '=', $slug)->first()) {
                $slug = "{$maybe_slug}-{$next}";
                $next++;
            }
            $model->slug = $slug;
            return true;
        });
    }
    /**
     * The post belongs to a user
     * @return [type] [description]
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * The post has many comments
     * @return [type] [description]
     */
    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
