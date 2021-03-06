<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use Validator;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetch = Province::latest()->get();
        $res = [
            'success' => true,
            'data' => $fetch,
            'message' => 'berhasil'
        ];

        return response()->json($res, 200);
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
        $validator = Validator::make($request->all(), [
            'prov_name' => 'required',
        ],[
            'prov_name.required' => "Mohon Masukan Nama Provinsi",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->errors(),
                'message' => 'silakan isi bidang yang kosong',
            ], 400);
        } else {
            $prov = Province::create([
                'prov_name' => $request->prov_name,
            ]);

            if ($prov) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil disimpan',
                ], 200);
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data gagal disimpan',
                ], 400);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prov = Province::whereId($id)->first();

        if ($prov) {
            return response()->json([
                'success' => true,
                'data' => $prov,
                'message' => 'Data ditemukan!'
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'data' => '',
                'message' => 'Data tidak ditemukan'
            ], 404);
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
        $validator = Validator::make($request->all(), [
            'prov_name' => 'required',
        ],[
            'prov_name.required' => "Mohon Masukan Nama Provinsi",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->errors(),
                'message' => 'silakan isi bidang yang kosong',
            ], 400);
        }else {
            $prov = Province::whereId($id)->update([
                'prov_name' => $request->prov_name,
            ]);

            if ($prov) {
                return response()->json([
                    'success' => true,
                    'message' => 'data berhasil diUpdate!',
                ], 200); 
            }else{
               return response()->json([
                    'success' => false,
                    'message' => 'data gagal diUpdate!',
               ], 500); 
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prov = Province::whereId($id)->first();
        

        if ($prov) {
            $prov->delete();
            return response()->json([
                'success' => true,
                'message' => 'data berhasil dihapus!',
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'data gagal dihapus',
            ], 500);
        }
    }
}
