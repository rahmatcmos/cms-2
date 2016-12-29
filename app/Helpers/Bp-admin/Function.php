<?php

function module($sectionId)
{
    $user_type = Auth::user()->user_type;
    $query = bp_module::select('*');
    if($user_type == 0) $query = $query->where('group_access->user', '1');
   // if($user_type == 2) $query = $query->where('group_access->admin', '1');
    return $query->whereSection($sectionId)->whereParent_id(0)->with('child')->get();
}

function custom()
{
	$query = bp_custom::get();
	return $query;
}

function bp_cat()
{
	$query = bp_category::get();
	return $query;
}

function posts($limitId)
{
    $post = bp_post::where('post_type','post')->orderby('id','desc')->paginate($limitId);
    return $post;
}
