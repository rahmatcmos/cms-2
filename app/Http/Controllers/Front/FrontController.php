<?php
/**
 * Created by Beyond Plus <bplusmyanmar@hotmail.com>
 * User: Beyond Plus
 * Date: D/M/Y
 * Time: MM:HH PM
 */
namespace Beyondplus\Http\Controllers\Front;

use Validator;
use Illuminate\Http\Request;
use Beyondplus\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Beyondplus\Models\Bp_post;
use Beyondplus\Models\Bp_category;
use Beyondplus\Models\Bp_menu;
use Beyondplus\Models\Bp_relationship;
use Beyondplus\Models\Bp_options;
use Beyondplus\Models\Bp_slider;
use Beyondplus\Models\User;
use Beyondplus\Models\Comments;
use Beyondplus\Http\Requests\PriorityRequest;


class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    
    var $categories;
    var $post;
    var $menus;
    var $title;
    var $description;
    var $theme;
    var $themes;
    var $sliders;

    public function __construct(){
        $this->themes = Bp_options::where('option_name','=', 'theme')->first();
        $this->categories = Bp_category::all($arrayName = array('category_name'));
        $this->post = Bp_post::paginate(10);
        $this->menus = Bp_menu::where('parent_id','=','0')->get();
        $this->sliders= Bp_slider::get();
    }

    public function t(){
        return $t = "theme.".$this->themes->option_value.".";
    }

    public function index(){
        return view($this->t().'index', $arrayName = array('title' => 'Welcome', 'page' => 'home' ,  'categories' => $this->categories, 'posts' => $this->post,'menus' => $this->menus , 'sliders' => $this->sliders ));
    }

    public function post($name) {  
        $bp_post = Bp_post::where('post_link', '=', $name)->get();
        if($bp_post === null){
            abort(404);
        } else {
        $bp_cat=Bp_category::select('*')->get();
        return view($this->t().'single', array('title' => 'Welcome', 'description' => '', 'page' => 'home', 'posts' => $bp_post, 'bp_cat' => $bp_cat, 'menus' => $this->menus));
        }
    }

    public function cat($name){
        $bp_cat=Bp_category::select('*')->get();
        $cat_id=Bp_category::select('category_id')->where('category_link','=', $name)->get()->first();
        if($cat_id === null){
            abort(404);
        } else {
            $term=Bp_relationship::select('post_id')->where('term_id','=', $cat_id->category_id)->get();
            return view($this->t().'post', array('title' => 'Welcome', 'description' => '', 'page' => 'home','bp_cat' => $bp_cat, 'menus' => $this->menus, 'term' => $term));
        }
       
    }
    
    public function comment(Request $request){
       $this->middleware('auth');
       Qanda::where('que_id','=', $request->input('que_id'))->increment('comment_count', 1);  
       $inputs = $request->all();
       $inputs['customer_id'] = Auth::user()->id;
       Comments::create($inputs);
        return 1;
    }

    public function search($q){
        $product= Product::where('name','=',$q)->paginate(10);
        return view('front.courses' ,$arrayName = array('courses' =>  $product,'mainCategories'=>$this->mainCategories , 'brands' => $this->brands ));
    }


}
?>


