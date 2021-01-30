<?php

namespace App\Http\Controllers;

use App\Models\Subdistrict;
use App\Models\District;
use Illuminate\Http\Request;

class SubdistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subdist = Subdistrict::all();
        return view('admin.subDistrict.index', compact('subdist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $district = District::all();
        return view('admin.subDistrict.create', compact('district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dist_id' => 'required',
            'subdist_name' => 'required',
        ]);
        Subdistrict::create($request->all());
        return redirect()->route('subdistrict.index')->with('toast_success', 'Data Kelurahan/Desa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subdistrict  $subdistrict
     * @return \Illuminate\Http\Response
     */
    public function show(Subdistrict $subdistrict)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subdistrict  $subdistrict
     * @return \Illuminate\Http\Response
     */
    public function edit(Subdistrict $subdistrict)
    {
        $district = District::all();
        return view('admin.subDistrict.edit', compact('district', 'subdistrict'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subdistrict  $subdistrict
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subdistrict $subdistrict)
    {
        Subdistrict::where('id', $subdistrict->id)
            ->update([
                'dist_id' => $request->dist_id,
                'subdist_name' => $request->subdist_name
            ]);
        return redirect()->route('subdistrict.index')->with('toast_success',"Data $subdistrict->subdist_name Berhasil Di Ubah!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subdistrict  $subdistrict
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subdistrict $subdistrict)
    {
        //
    }
}
