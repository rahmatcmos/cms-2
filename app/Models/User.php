<?php

namespace Beyondplus\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'users';

    protected $fillable = [
    	'id','name', 'email','avatar','password','api_token', 'role', 'created_at'
    ];

    public function parent()
    {
        return $this->belongsTo('Beyondplus\user', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('Beyondplus\user', 'parent_id');
    }
}
