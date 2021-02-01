<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class plagueAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Province::all();
        if ($data) {
            return [
                'status' => 200,
                'data' => $data,
                'msg' => 'Berhasil',
                ];   
        }else{
            return [
                'status' => 401,
                'msg' => 'data gagal diakses',
            ];
        }
        
    }

    public function search($key)
    {
        $data = Province::where('prov_name', 'like', '%'. $key. '%')->get();

        return response()->json([
            'status' => 200,
            'data' => $data,
            'message' => "berhasil"
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
