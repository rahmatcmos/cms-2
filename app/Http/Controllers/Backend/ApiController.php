<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\StudentNote;
use DB;
class ApiController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function getCustomerNote($customerId, Request $request){
        $query = StudentNote::where('student_id' , $customerId)->paginate(10);
        $query['creator'] = User::where('id','1')->get();
        if(sizeof($query)>0){

            return $query;
        } else {
          return  json_encode([]);
        }

    }

    public function postCustomerNote(Request $request){
        //if($request){
          StudentNote::create($request->all());

      //  return $query;
    }

    public function note(){
      $query = StudentNote::paginate(10);
      $result= $query;
      foreach ($query as $key => $value) {
        //  echo $value->id;
          $result[$key]['creator'] = User::where('id', $value->id)->first();
        //  $result[] = $value;
      }
      // $query = DB::table('student_note')
      //       ->join('user', 'user.id', '=', 'student_note.student_id')
      //       ->select('student_note.*', 'user.* as creator.*')
      //       ->paginate(10);

      return $result;
    }
    public function search(Request $request){

       $query = $this->userDb($request->all());
      if(sizeof($query)>0){
        return  $query;
      } else {
        return  json_encode([]);
      }

    }

    public function userDb($where){
      $array = User::get();
      $array = $array->toArray();
  //  $query =  in_array($where , User::all());
      $query = User::orderBy('id', 'desc');
      foreach ($where as $key => $value) {
        if(array_key_exists($key, $array[0])){
          if($key == 1){
              $query = $query->Where($key, 'like', '%'.$value.'%');
          } else {
              $query = $query->orWhere($key, 'like', '%'.$value.'%');
          }
        } else {

        }
      }
      $query = $query->paginate(10);
      return $query;
    }
}
