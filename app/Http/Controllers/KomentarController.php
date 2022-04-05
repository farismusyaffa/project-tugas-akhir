<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Http\Requests\StoreKomentarRequest;
use App\Http\Requests\UpdateKomentarRequest;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreKomentarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeKlien(StoreKomentarRequest $request)
    {
        $validatedData = $request->validate([
            'komentar'=>'required',
            'platform_id'=>'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Komentar::create($validatedData);
        return back()->with('success','Komentar baru berhasil ditambahkan!');
    }

    public function storeFasilitator(StoreKomentarRequest $request)
    {
        $validatedData = $request->validate([
            'komentar'=>'required',
            'platform_id'=>'required'
        ]);

        $validatedData['fasilitator_id'] = auth()->user()->id;
        Komentar::create($validatedData);
        return back()->with('success','Komentar baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function show(Komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function edit(Komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKomentarRequest  $request
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKomentarRequest $request, Komentar $komentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function destroyKlien(Komentar $komentar, $id)
    {
        $komentar = Komentar::find($id);

        $komentar->delete();
        return back()->with('success','Komentar berhasil dihapus!');
    }

    public function destroyFasilitator(Komentar $komentar, $id)
    {
        $komentar = Komentar::find($id);

        $komentar->delete();
        return back()->with('success','Komentar berhasil dihapus!');
    }
}
