<?php

function posts($limitId)
{
    $post = bp_post::where('post_type','post')->orderby('id','desc')->paginate($limitId);
    return $post;
}
