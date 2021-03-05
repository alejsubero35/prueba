<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\HotelUser;
use App\Models\RoleUser;
use App\Traits\UserTrait;
use App\Traits\GeneralTrait;

class UserController extends Controller
{
    use UserTrait;
    use GeneralTrait;

    public function index()
    {
        $roles = $this->rolesforUser();
        $countries = Country::all();
        $hotels = $this->hotels();
        return view('user.index',compact('roles','countries','hotels'));
    }

    public function create(Request $request)
    {
     
    }

    public function save(Request $request)
    {

        $emailduplicated = $this->duplicatedEmail($request);

        if ($emailduplicated) {
            $response = ['data' => $emailduplicated,
                         'success' => false,
                         'messaje' => 'Email ya existe en base de datos.'
                        ];
            return response()->json($response); 

        }

        $users = new User($request->all());
        $password = (int)$request->identity_document;
        $users->password            = Hash::make( $password );
        $users->user_creator_id     = Auth::user()->id;
       
        if ($users->save()) {
            $hotel_user = $this->saveHotelUser($users, $request);
           // Le asignamos el rol de Cliente
            
            $role_user  = $this->saveRoleUser($users);

             $response = ['data' => $users,
                         'success' => true,
                         'id' => $users->id,
                         'messaje' => 'users creado con exito.'
                        ];
            }

            return response()->json($response); 

    }

   
    public function update(Request $request)
    {

        if($request->id) {
            $user = User::where('id',$request->id)->first();
            $user->first_name          = $request->first_name;
            $user->last_name           = $request->last_name;
            $user->email               = $request->email;
            //$password                  = (int)$request->identity_document;
            //$user->password            = Hash::make($password);
            $user->role_id             = $request->role_id;
            $user->telephone           = $request->telephone;
            $user->nationality         = $request->nationality;
            $user->identity_document   = $request->identity_document;
            $user->civil_status        = $request->civil_status;
            $user->country_id          = $request->country_id;
            $user->home_address        = $request->home_address;
            $user->user_creator_id     = Auth::user()->id;
         
        }
        
        if ($user->save()) {
         
                $hotel_user = HotelUser::where('user_id',$request->id)->first();
                if ($hotel_user) {
                    $hotel_user->hotel_id = ($request->hotel_id) ? $request->hotel_id : null ;
                    $hotel_user->user_id  = $user->id;
                    $hotel_user->user_created_id = Auth::user()->id;
                    $hotel_user->save();
                }
                

                $roles_users = RoleUser::where('user_id', $request->id)->get();

                foreach($roles_users as $rol_user){
                    $rol_user->delete();
                }

           }
           
           $role_user  = $this->saveRoleUser($user);

           $response = ['data' => $user,
                        'success' => true,
                        'id' => $user->id,
                        'messaje' => 'users actualizado con exito.'
                    ];

           return response()->json($response); 
       

    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if ($id) {
            $user = User::find($id);
            
            $user->email = $user->id.'-NULL-'.$user->email;
            $user->save();
            
            $user->delete();
        }

        return response()->json($user);

    }

    public function data(Request $request)
    {
        $users = User::with('role')
                    ->with('hotel')
                    ->join('hotel_user as hu', 'hu.user_id','=','users.id')
                    ->select('hu.hotel_id','users.*');
                   
        $id = $request->input('id');
        
        if ($id) {
            $users = $users->where('users.id', $id);            
        }

            $users = $users->where('hu.hotel_id', session('hotel_id'))
                            ->orderBy('id','desc')
                            ->get()
                            ->map(function($user){
                                
                                return[
                                    'id'                => $user->id,
                                    'first_name'        => $user->first_name,
                                    'last_name'         => $user->last_name,
                                    'email'             => $user->email,
                                    'telephone'         => $user->telephone,
                                    'role_id'           => ($user->role) ? (int) $user->role->id : '',
                                    'rol_name'          => ($user->role) ? ucfirst($user->role->name) : '',
                                    'hotel_id'          => $user->hotel_id,
                                    'identity_document' => $user->identity_document,
                                    'civil_status'      => $user->civil_status,
                                    'nationality'       => $user->nationality,
                                    'home_address'      => $user->home_address,
                                    'country_id'        => $user->country_id,
                                ];
                            });

        $response = ['list' => $users];
        return response()->json($response);
    }

}
