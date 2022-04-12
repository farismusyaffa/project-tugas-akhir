<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasukController extends Controller
{
    // public function viewMasukKlien(){
    //     return view('klien.masukklien',[
    //         'title' => 'Masuk Sebagai Klien'
    //     ]);
    // }

    // public function viewMasukFasilitator(){
    //     return view('fasilitator.masukfasilitator',[
    //         'title' => 'Masuk Sebagai Fasilitator'
    //     ]);
    // }

    public function masuk(Request $request){
        // $credentials = $request->validate([
        //             'email'=>'required|email',
        //             'password'=>'required'
        //         ]);
        if(Auth::guard('user')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->intended('/berandaklien');
        }elseif (Auth::guard('fasilitator')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->intended('/berandafasilitator');
        }elseif (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->intended('/dashboard');
        }
        return back()->with('GagalMasuk', 'Gagal Masuk!');
    }

    // public function masukKlien(Request $request){
    //     $credentials = $request->validate([
    //         'email'=>'required|email:dns',
    //         'password'=>'required'
    //     ]);

    //     if(Auth::attempt($credentials)){
    //         $request->session()->regenerate();
    //         return redirect()->intended('/berandaklien');
    //     };

    //     return back()->with('GagalMasuk', 'Gagal Masuk!');
        
    // }

    // public function keluarKlien(Request $request){
    //     Auth::logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }

    // public function masukFasilitator(Request $request){
    //     $credentials = $request->validate([
    //         'email'=>'required|email:dns',
    //         'password'=>'required'
    //     ]);

    //     if(Auth::attempt($credentials)){
    //         $request->session()->regenerate();
    //         return redirect()->intended('/berandafasilitator');
    //     };

    //     return back()->with('GagalMasuk', 'Gagal Masuk!');
        
    // }

    // public function keluarFasilitator(Request $request){
    //     Auth::logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }

    public function keluar(){
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            return redirect('/');
        }elseif(Auth::guard('fasilitator')->check()){
            Auth::guard('fasilitator')->logout();
            return redirect('/');
        }elseif(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            return redirect('/');
        }
    }
}
