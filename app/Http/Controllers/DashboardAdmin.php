<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdmin extends Controller
{
    public function dashboard(){
        return view('admin.dashboard',[
            'title'=>'Dashboard'
        ]);
    }
    
}
