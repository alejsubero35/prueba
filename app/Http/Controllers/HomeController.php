<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Session;

class HomeController extends Controller
{
    
  
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* public function index()
    {
        $user = Auth::user(); */
        //dd(Auth::user()->rol_name);
       // dd( Session::get('hotel_id'), session('hotel_id'));
        //dd( $user->roles()->first()->name);
        //dd( $user->rol_name );
        //dd($user->role->where('slug','super-admin')->first());
       // dd( $user->hasRole('super-admin' ));
       

      /*   return view('home');
    } */

    public function index()
    {
        return view('home');
    }

    public function getTokens()
    {
        return view('home.personal-tokens');
    }

    public function getClients()
    {
        return view('home.personal-clients');
    }

    public function getAuthorizedClients()
    {
        return view('home.authorized-clients');
    }
}
