<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
        'agent'
    ];

    /**
     * An IP belongs to a user
     * @return [type] [description]
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
