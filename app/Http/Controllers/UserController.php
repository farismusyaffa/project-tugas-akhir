<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(Request $request){
        return view('klien.profilklien',[
            'title'=>'Profil',
            'user' => $request->user()
        ]);
    }

    public function update(UpdateProfileRequest $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'level' => 'required',
            'status' => 'required',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:6|max:255',
            'username' =>'required|min:8|max:255|unique:users',
            'noHP'=>'required|max:15',
            'jeniskelamin'=>'required',
            'tempatlahir'=>'max:255',
            'tanggallahir'=>'',
            'alamat'=>''
       ]);
    //    $validatedData['password'] = bcrypt($validatedData['password']);
       $klien = User::find($id);
    //    dd($klien);
       $klien->name = $request->name;
       $klien->level = $request->level;
       $klien->status = $klien->status;
       $klien->password = $klien->password;
       $klien->email = $request->email;
       $klien->username = $request->username;
       $klien->noHP = $request->noHP;
       $klien->jeniskelamin = $request->jeniskelamin;
       $klien->tempatlahir = $request->tempatlahir;
       $klien->tanggallahir = $request->tanggallahir;
       $klien->alamat = $request->alamat;
       $klien->save();
    return back()->with('success','Data berhasil diupdate!');
    }

    public function updateStatus(UpdateProfileRequest $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'level' => 'required',
            'status' => 'required',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:6|max:255',
            'username' =>'required|min:8|max:255|unique:users',
            'noHP'=>'required|max:15',
            'jeniskelamin'=>'required',
            'tempatlahir'=>'max:255',
            'tanggallahir'=>'',
            'alamat'=>''
       ]);
    //    $validatedData['password'] = bcrypt($validatedData['password']);
       $klien = User::find($id);
    //    dd($klien);
       $klien->name = $request->name;
       $klien->level = $request->level;
       $klien->status = $klien->status;
       $klien->password = $klien->password;
       $klien->email = $request->email;
       $klien->username = $request->username;
       $klien->noHP = $request->noHP;
       $klien->jeniskelamin = $request->jeniskelamin;
       $klien->tempatlahir = $request->tempatlahir;
       $klien->tanggallahir = $request->tanggallahir;
       $klien->alamat = $request->alamat;
       $klien->save();
    return back()->with('success','Data berhasil diupdate!');
    }

    public function destroy(User $user, $id)
    {
        $klien = User::find($id);
        $klien->delete();
        return back()->with('success','Klien Berhasil Dihapus!');
    }

}
