<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'gateway_id',
        'price',
        'active',
        'teams_enabled',
        'teams_limit'
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            // Make a slug for the user ex: firstname.lastname.xx
            $slug = str_slug($model->name);

            $model->slug = $slug;
            return true;
        });
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function scopeActive(Builder $builder){
        return $builder->where('active', true);
    }

    public function scopeForUsers(Builder $builder){
        return $builder->where('teams_enabled', false);
    }

    public function scopeForTeams(Builder $builder){
        return $builder->where('teams_enabled', true);
    }
}
