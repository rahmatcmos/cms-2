<?php

namespace Beyondplus\models;

use Illuminate\Database\Eloquent\Model;

class Bp_category extends Model
{
    protected $primaryKey = 'category_id';
    protected $table = 'bp_category';

    protected $fillable = [
    	'category_id','category_name', 'parent_id','category_link','category_icon', 'category_dash', 'category_active'
    ];

    public function parent()
    {
        return $this->belongsTo('Beyondplus\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('Beyondplus\Category', 'parent_id');
    }

    public function posts()
    {
        return $this->belongsToMany('Beyondplus\Models\Bp_post');
    }

}
