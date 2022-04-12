<?php

namespace App\Http\Controllers;

use App\Models\Fasilitator;
use Illuminate\Http\Request;

class FasilitatorController extends Controller
{
    public function index()
    {
        $fasilitator = Fasilitator::all();
        return view('fasilitator.profilfasilitator',[
            'title'=>'Profil',
            'fasilitator'=>$fasilitator
        ]);
    }

    
    public function destroy(Fasilitator $fasilitator, $id)
    {
        $fasilitator = Fasilitator::find($id);
        $fasilitator->delete();
        return back()->with('success','Fasilitator Berhasil Dihapus!');
    }
}
