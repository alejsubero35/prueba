<?php

namespace App\Http\Controllers\Api\Tienda;

use Validator;
use App\Models\Tienda;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class TiendaController extends ApiController
{
    use ApiResponser;

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTiendas()
    { 
        
        $tiendas = Tienda::where('is_active',1)->get();

    	return $this->showAll($tiendas);
    }
    

    public function store(Request $request)
    {
      
        $tienda = new Tienda;
        $tienda->name               = 'Panama Shooes';//$request->name;
        $tienda->address            = 'Panama / provincia';//$request->address;  
        $tienda->telephone          = '5623659874';//$request->telephone;
        $tienda->email              = 'albertoCastillo@gmail.com';//$request->email; 
        $tienda->location_in_map    = 'lat:2,long:5';//$request->location_in_map;
        $tienda->image              = '1254lki.png';//$request->image; TODO:'este campo debe guardarse en el storage'
        $tienda->is_Active          = 1;
        $tienda->save();
          
        return $this->successReponse($tienda);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
