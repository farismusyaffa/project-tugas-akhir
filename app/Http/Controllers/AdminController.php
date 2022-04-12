<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Platform;
use App\Models\Fasilitator;
use App\Models\User;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klien = User::all();
        $countKlien = $klien->count();
        $klienMenunggu = User::where('status','like',"%Menunggu%")->get();
        $countklienMenunggu = $klienMenunggu->count();
        $klienAktif = User::where('status','like',"%Aktif%")->get();
        $countklienAktif = $klienAktif->count();
        $fasilitator = Fasilitator::all();
        $countFasi = $fasilitator->count();
        $fasilitatorMenunggu = Fasilitator::where('status','like',"%Menunggu%")->get();
        $fasilitatorAktif = Fasilitator::where('status','like',"%Aktif%")->get();
        $countFasiMenunggu = $fasilitatorMenunggu->count();
        $countFasiAktif = $fasilitatorAktif->count();
        $platform = Platform::all();
        $countPlatform = $platform->count();
        $totalpengguna = $countKlien + $countFasi;
        // dd($totalpengguna);
        return view('admin.dashboard',[
            'title'=>'Dashboard',
            'countKlien'=>$countKlien,
            'countklienMenunggu'=>$countklienMenunggu,
            'countklienAktif'=>$countklienAktif,
            'countFasi'=>$countFasi,
            'countFasiMenunggu'=>$countFasiMenunggu,
            'countFasiAktif'=>$countFasiAktif,
            'countPlatform'=>$countPlatform,
            'totalpengguna'=>$totalpengguna
        ]);
    }

    public function showKlien()
    {
        $klien = User::all();
        $klienMenunggu = User::where('status','like',"%Menunggu%")->get();
        $klienAktif = User::where('status','like',"%Aktif%")->get();
        $fasilitator = Fasilitator::all();
        $fasilitatorMenunggu = Fasilitator::where('status','like',"%Menunggu%")->get();
        $fasilitatorAktif = Fasilitator::where('status','like',"%Aktif%")->get();
        $platform = Platform::all();
        $countFasi = $fasilitator->count();
        $countKlien = $klien->count();
        // dd($klienMenunggu);
        return view('admin.klien',[
            'title'=>'Klien',
            'klienMenunggu'=>$klienMenunggu,
            'klienAktif'=>$klienAktif
        ]);
    }

    public function showFasilitator()
    {
        $klien = User::all();
        $klienMenunggu = User::where('status','like',"%Menunggu%")->get();
        $klienAktif = User::where('status','like',"%Aktif%")->get();
        $fasilitator = Fasilitator::all();
        $fasilitatorMenunggu = Fasilitator::where('status','like',"%Menunggu%")->get();
        $fasilitatorAktif = Fasilitator::where('status','like',"%Aktif%")->get();
        $platform = Platform::all();
        $countFasi = $fasilitator->count();
        $countKlien = $klien->count();
        // dd($klienMenunggu);
        return view('admin.fasilitator',[
            'title'=>'Fasilitator'
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
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
