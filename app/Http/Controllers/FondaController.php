<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fonda;
use Mockery\CountValidator\Exception;

class FondaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $error = false;
            $statusCode = 200;
            $fondas = Fonda::get();
            if(empty($fondas)){
                throw new Exception();
            }
        }catch (Exception $e){
            $error = true;
            $statusCode = 400;
        }finally {
            return response()->json(array(
                'error' => $error,
                'fondas' => $fondas->toArray()),
                $statusCode
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fonda = new Fonda();
        $fonda->name= $request->get('name');
        $fonda->address= $request->get('address');
        $fonda->postalcode= $request->get('postalcode');
        $fonda->schedules= $request->get('schedules');
        $fonda->created_at=time();
        $fonda->updated_at=time();

        $fonda->save();

        return response()->json(array(
            'error' => false,
            'fonda' => $fonda->toArray()),
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $fondas = null;
            $error = false;
            $statusCode = 200;
            $fondas = Fonda::where('id', $id)->get();
            if($fondas->isEmpty()){
                throw new Exception();
            }
        }catch (Exception $e){
            $error = true;
            $statusCode = 404;
        }finally {
            return response()->json(array(
                'error' => $error,
                'fondas' => $fondas?$fondas->toArray():$fondas),
                $statusCode
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
