<?php

function module($sectionId)
{
    $user_type = Auth::user()->user_type;
    $query = BeyondPlus\CmsLibrary\Models\Bp_module::select('*');
    if($user_type == 0) $query = $query->where('group_access->user', '1');
   // if($user_type == 2) $query = $query->where('group_access->admin', '1');
    return $query->whereSection($sectionId)->whereParent_id(0)->with('child')->get();
}

function custom()
{
	$query = BeyondPlus\CmsLibrary\Models\Bp_custom::get();
	return $query;
}