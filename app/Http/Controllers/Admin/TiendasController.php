<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checking;
use App\Traits\GeneralTrait;

class CheckingController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $rooms = $this->rooms(session('hotel_id'));
        $users = $this->userInReservation();
    
        return view('checking.index',compact('rooms','users'));
    }

    public function create(Request $request)
    {
        $checking = Checking::join('users as u','u.id','=','checkings.user_id')
                            ->join('rooms as r','r.id','=','checkings.room_id')    
                            ->select('checkings.id as id_checking','u.first_name','u.last_name',
                                'checkings.checking','checkings.arrival_date','checkings.departure_date',
                                'r.num_room')
                            ->get()
                            ->map(function($check){
                                return[
                                    'id' => $check->id_checking,
                                    'fullname' => $check->first_name.' '.$check->last_name,
                                    'habitacion' => $check->num_room,
                                    'checking'   => $check->checking,
                                    'arrival_date' => $check->arrival_date,
                                    'departure_date' => $check->departure_date,
                                ];
                            });

        $response = ['list' => $checking];
        return response()->json($response);
    }

    public function save(Request $request)
    {
        $checking = new Checking($request->all());
        $arrival                    = date_create($checking['arrival_date']);
        $arrival_date               = date_format($arrival, "Y-m-d");
        $departure                  = date_create($checking['departure_date']);
        $departure_date             = date_format($departure, "Y-m-d");
        $checking->arrival_date     = $arrival_date; 
        $checking->departure_date   = $departure_date; 
        $checking->checking         = $arrival_date;
        $checking->is_active        = 1;
        $checking->hotel_id         = session('hotel_id'); 
        $checking->user_created_id  = 1;

        if ($checking->save()) {
       
             $response = ['data'   => $checking,
                         'success' => true,
                         'id'      => $checking->id,
                         'messaje' => 'checking creado con exito.'
                        ];
            }

        return response()->json($response);

    }

    public function update(Request $request)
    {
        $data = $request->input('data');
     
        if ($data['id']) {
            $checking = Checking::where('id',$data['id'])->first();;
            $checking->checkout = $data['departure_date'];
            $checking->is_active = 0;

            if ($checking->save()) {
                $response = ['data'     => $checking,
                            'success'   => true,
                            'id'        => $checking->id,
                            'messaje'   => 'Checkout procesed successfully.'
                        ];
            } 
        }
      
   
        return response()->json($response);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        if ($id) {
            $checking = Checking::where('id',$id)->get();
        } 

        $response = ['list' => $checking];
        return response()->json($response);
     
    }
}
