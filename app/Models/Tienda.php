<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table = 'tiendas';
    protected $fillable = [
        'arrival_date','departure_date','cheking',
        'checkout','is_active','room_id','hotel_id',
        'user_id','user_created_id',''];

    public function users() {
     
        return $this->hasMany(User::class);
            
     }
}
