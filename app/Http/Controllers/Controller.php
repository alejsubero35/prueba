<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNotificacion()
    {
        $notification = \DB::table('orders as o')
                           ->select('u.first_name','u.last_name','o.id','r.num_room','o.status','o.is_read')
                            //->join('hotels as h','h.id','=','o.hotel_id')
                            ->join('users as u','u.id','=','o.user_id')
                            ->join('reservations as re','o.reservation_id','=','re.id')
                            ->join('rooms as r','re.room_id','=','r.id')
                            ->whereNull( 'o.deleted_at' )
                            ->whereNull( 'u.deleted_at' )
                            ->whereNull( 're.deleted_at' )
                            ->whereNull( 'r.deleted_at' )
                            ->where('o.hotel_id', session('hotel_id'))
                            ->where('o.is_read', 0)
                            ->get();
      
        return response()->json($notification);
    } 

    public function updateNotificacion($id)
    {

        $update = Order::find($id);
        $update->is_read = 1;
        $update->save();

        return response()->json($update);
    }

    public function getNotificacionService()
    {
        $notifyservice = \DB::table('room_services as rs')
                            ->select('u.first_name','u.last_name','rs.id','r.num_room','rs.status','rs.is_read')
                            //->join('hotels as h','h.id','=','rs.hotel_id')
                            ->join('service_areas as sa','sa.id','=','rs.service_area_id')
                            ->join('users as u','u.id','=','rs.user_id')
                            ->join('reservations as re','rs.reservation_id','=','re.id')
                            ->join('rooms as r','re.room_id','=','r.id')
                            ->where('rs.hotel_id',session('hotel_id'))
                            ->whereNull( 'rs.deleted_at' )
                            ->where('sa.slug', Auth::user()->rol_name->slug)
                            ->where('rs.is_read', 0)
                            ->get();

        return response()->json($notifyservice);
    }
}
