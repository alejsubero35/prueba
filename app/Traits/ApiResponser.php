<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser
{
    function successReponse($data,$code=200)
    {
        return response()->json($data, $code);
    }//successResponse

    /**
     * 
     * @param mixed $message String|Array
     * @param integer $code
     * @return String 
     */
    function errorResponse($message, $code)
    {
        return response()->json(["error"=>["message"=>$message,"code"=>$code]],$code);
    }//errorResponse

    function showAll(Collection $collection,$code=200)
    {
        if($collection->isEmpty())
        {
            $arData = ["data"=>$collection];
            return $this->successReponse($arData,$code);
        }
        $collection = $this->sortData($collection);
        $collection = $this->paginateCollection($collection);
        //$resource = $collection->first()->resource;
        //$transformedCollection = $resource::collection($collection);
        $arData = ["data"=>$collection];
        
        return $this->successReponse($arData, $code);
    }//showAll

    function showAlls(Collection $collection,$code=200)
    {
        if($collection->isEmpty())
        {
            $arData = ["data"=>$collection];
            return $this->successReponse($arData,$code);
        }
        //$collection = $this->sortData($collection);
       // $collection = $this->paginateCollection($collection);
        //$resource = $collection->first()->resource;
        //$transformedCollection = $resource::collection($collection);
        $arData = [
            "data"=> $this->sortData($collection),
            "paginate" => $this->paginateCollection($collection)
        ];
        
        return $this->successReponse($arData, $code);
    }//showAll

    function showOne(Model $instance, $code=200)
    {
        /* $resource = $instance->resource;
        $transformedInstance = new $resource($instance);
        $arData = ["data"=>$transformedInstance];
        return $this->successReponse($arData,$code);
        */
       // $transformer = $instance->transformer;
       // $instance = $this->transformData($instance, $transformer); 
        
		return $this->successReponse(['data' => $instance], $code);
    }//showOne

    function showMessage(String $message, $code=200)
    {
        return $this->successReponse($message,$code);
    }//showMessage    

    function paginateCollection(Collection $collection)
    {
        $perPage = $this->determinePageSize();
        $page = LengthAwarePaginator::resolveCurrentPage();
        $results = $collection->slice(($page-1)*$perPage,$perPage)->values();
        $paginated = new LengthAwarePaginator(
                $results,$collection->count()
                ,$perPage
                ,$page
                ,["path"=> LengthAwarePaginator::resolveCurrentPath()]
        );
        $paginated->appends(request()->query());
        return $paginated;
    }//paginateCollection
    
    function determinePageSize()
    {
        $rules = [
            "per_page" => "integer|min:2|max:50",
        ];
        //aqui se puede dar la excepción
        $perpage = request()->validate($rules);
        return isset($perpage["per_page"]) ? (int)$perpage["per_page"] : 5;
    }//determinePageSize

    protected function transformData($data, $transformer){
        $transformation = fractal($data, new $transformer);
        return $transformation->toArray();
    }

    protected function sortData(Collection $collection)
    {
        if(request()->has('sort_by')){
            $attibute = request()->sort_by;

            $collection = $collection->sortBy->{$attibute};
        }
        return $collection;
    }
}