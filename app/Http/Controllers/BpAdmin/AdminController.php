<?php
/**
 * Created by Beyond Plus <bplusmyanmar@hotmail.com>
 * User: Beyond Plus
 * Date: D/M/Y
 * Time: MM:HH PM
 */
namespace Beyondplus\Http\Controllers\BpAdmin;

use Illuminate\Http\Request;
use Beyondplus\Http\Requests;
use Beyondplus\Http\Controllers\Controller;
use Beyondplus\Models\Bp_post;
use Beyondplus\Admin;
use Beyondplus\User;

class AdminController extends Controller
{
	public function __construct()
    {
       $this->middleware('admins');
    }

    public function index()
    {
    	$post = Bp_post::where('post_type','=', 'post')->orderBy('created_at','ASC')->paginate(13);
    	$allUser=Admin::get()->count();

        $latestUser= User::get();
        // print_r($latestUser);
        return view('/bp-admin/home', array('post' => $post , 'allUser' => $allUser, 'latestUser' => $latestUser ));
    }
    
    
   
}
