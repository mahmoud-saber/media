<?php

namespace App\Http\Controllers\User;

 use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
   public function logout()
   {
    # code...
    auth()->logout();
        return redirect('/');
   }
   public function deleteAll()
   {

      $op =  DB::table('albums')->delete();
      if($op){
          $message = 'Rows Removed';
     }else{
       $message = 'Rows Not Removed';

     }
     session()->flash('message',$message);
     return redirect(url('/album'));
   }

}