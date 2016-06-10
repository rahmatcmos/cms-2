<?php

namespace Beyondplus\models;

use Illuminate\Database\Eloquent\Model;

class Bp_menu extends Model
{
    protected $primaryKey = 'menu_id';
    protected $table = 'bp_menu';

    protected $fillable = [
    	 'menu_name','post_id','menu_weight','menu_icon','parent_id' ,'menu_created','created_at','updated_at'
    ];

}
