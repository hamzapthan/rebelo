<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;
    public function redirectTo(){
        if(Auth::user()->role == 1){
        // $id = Auth::user()->id;
        //  $role_name = User::join('model_has_roles','model_has_roles.model_id','=','users.id')
        //                          ->join('roles','roles.id','=','model_has_roles.role_id')
        //                          ->where('model_has_roles.model_id',$id)
        //                          ->select('roles.*')
        //                          ->get();
        //     $role =  $role_name[0]["name"];
        //     if($role == 'Admin'){
           $this->redirectTo = 'admin/dashboard';
       
           return $this->redirectTo;
       }else{

        $this->redirectTo = '/dummy';
         return $this->redirectTo;
       
       }
    
        // }elseif(Auth::user()->role == 0){
        //     $this->redirectTo = 'front/dashboard';
        //    return $this->redirectTo;
        // }else{
        //      $this->redirectTo = 'admin/login';
        //         return $this->redirectTo;
        // }
        // switch(Auth::user()->role){
        //   case 1:
        //   $this->redirectTo = 'admin/dashboard';
        //    return $this->redirectTo;
        //    break;
        //    case 0:
        //         $this->redirectTo = 'frontend/user';
        //         return $this->redirectTo;
        //         break;
        //     default:
        //         $this->redirectTo = 'admin/login';
        //         return $this->redirectTo;


        // }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
