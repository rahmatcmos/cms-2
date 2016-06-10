<?php

namespace Beyondplus\models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $primaryKey = 'que_id';
    protected $table = 'comments';

    protected $fillable = [
    	 'comment_id', 'que_id','customer_id','comment_value','comment_active','created_at','updated_at'
    ];

  	public function users()
    {
        return $this->hasMany('Beyondplus\Models\User','id', 'customer_id');
    }
}
