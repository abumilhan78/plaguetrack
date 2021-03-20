<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $local = Track::with('rw.subdist.district.city.province')->get();
        return view('admin.localCase.index', compact('local'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.localCase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Track::create($request->all());
        return redirect()->route('local.index')->with('toast_success', 'Data Kasus Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $track = Track::findOrFail($id);
        return view('admin.localCase.edit', compact('track'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Track::where('id', $id)
            ->update([
                'rw_id' => $request->rw_id,
                'sembuh' => $request->sembuh,
                'meninggal' => $request->meninggal,
                'positif' => $request->positif,
                'reaktif' => $request->reaktif
            ]);
        return redirect()->route('local.index')->with('toast_success',"Data Kasus Berhasil Di Ubah!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Track::destroy($id);
        return redirect()->route('local.index')->with('toast_success',"Data Kasus Berhasil Di Hapus!");
    }
}
