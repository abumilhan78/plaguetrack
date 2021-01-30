<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Subdistrict;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rw = Rw::all();
        return view('admin.rw.index', compact('rw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subdist = Subdistrict::all();
        return view('admin.rw.create', compact('subdist'));
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
            'subdist_id' => 'required',
            'rw_name' => 'required',
        ]);
        Rw::create($request->all());
        return redirect()->route('rw.index')->with('toast_success', 'Data RW Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function show(Rw $rw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function edit(Rw $rw)
    {
        $subdist = Subdistrict::all();
        return view('admin.rw.edit', compact('subdist', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rw $rw)
    {
        Rw::where('id', $rw->id)
            ->update([
                'subdist_id' => $request->subdist_id,
                'rw_name' => $request->rw_name
            ]);
        return redirect()->route('rw.index')->with('toast_success',"Data $rw->rw_name Berhasil Di Ubah!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rw $rw)
    {
        //
    }
}
