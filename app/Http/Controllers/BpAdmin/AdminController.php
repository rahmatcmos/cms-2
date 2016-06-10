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

class AdminController extends Controller
{
	public function __construct()
    {
       $this->middleware('admins');
    }

    public function index()
    {
    	$post = Bp_post::where('post_type','=', 'post')->orderBy('created_at','ASC')->paginate(13);
        return view('/bp-admin/home', array('post' => $post));
    }
    
    
   
}
