<?php

namespace App\Models;

use App\Models\Traits\HasRoles;
use Laravel\Cashier\Billable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Billable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Loop through `users` table, and find the duplicated.
     * Increment the number after the slug, to keep the first- and lastname.
     * The slug is the lookup column.
     * @return [type] [description]
     */
    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            // Make a slug for the user ex: firstname.lastname.xx
            $slug = $maybe_slug = strtolower(str_slug($model->firstname) . '.' . str_slug($model->lastname));
            $next = 2;
            while (User::where('slug', '=', $slug)->first()) {
                $slug = "{$maybe_slug}.{$next}";
                $next++;
            }
            $model->slug = $slug;
            return true;
        });
    }

    /**
     * Insted of ID, use the slug column for lookup
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * A user has many posts
     * @return [type] [description]
     */
    public function post(){
        return $this->hasMany(Post::class);
    }

    /**
     * A user has many comments
     * @return [type] [description]
     */
    public function comment(){
        return $this->hasMany(Comment::class);
    }

    /**
     * A user has many sign in IP's
     * @return [type] [description]
     */
    public function ip(){
        return $this->hasMany(Ip::class);
    }
}
