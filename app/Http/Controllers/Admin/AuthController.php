<?php

namespace App\Http\Controllers\Admin;

use Session;

use Validator;
use App\Models\User;
use App\Models\Hotel;
use App\Models\HotelUser;
use App\Traits\UserTrait;
use App\Models\ServiceArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use UserTrait;
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
  {
        $this->validateLogin($request);
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
             if(Auth::check()){   
                $user = Auth::user();
               
                if($this->isRoleHuesped( Auth::user() )){
                    
                    Auth::logout();
                    return redirect()->route('login')->with('error', trans('auth.error_huesped'));

                }else{
                    
                    $hotelUser = HotelUser::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
                    
                    if($hotelUser){
                        $hotel     = Hotel::find( $hotelUser->hotel_id );
                        

                        session(['hotel_id' => $hotelUser->hotel_id]);
                        session(['hotel_name' => $hotel->name]);
                                              
                        
                        return redirect()->route('home');
                    }else{
                        Auth::logout();
                        return redirect()->route('login')->with('warning', trans('auth.warning_user'));
                    }
                    
                    
                    
                }

                
                 
            }
            
        }
        return back()->withErrors(['error' => trans('auth.failed')]);
  }

    public function validateLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
    }

    public function logout(Request $request)
    {

      Auth::logout();
      $request->session()->invalidate();
      return redirect('/');

    }
 
    private function isRoleHuesped($auth){
        if($auth->rol_name && $auth->rol_name->slug == 'huesped'){
            return true;
        }
        return false;
    }

    private function tryAuthenticate($request)
    {
        $user = User::where('email', $request->get('email'))->first();
        if (!is_null($user)) {
            
            if (Hash::check($request->get('password'), $user->password)) {
                
                return $user;
            }
            return null;
        }
        return null;
    }

    public function changePassword(Request $request, $email)
    {
        $validator = \Validator::make($request->all(), [
            'temporary' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required'
        ]);

        if (!$validator->fails()) {

            $user = User::where('email', $email)->first();

            if (Hash::check($request->get('temporary'), $user->password)) {
                $user->password = bcrypt($request->get('new_password'));
                $user->save();
                $status = "updated";
            } else {
                $status = "invalid";
            }

            if ($request->ajax()) {
                return response()->json(['status' => $status]);
            }

        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
    }

}