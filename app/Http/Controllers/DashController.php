<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;

class DashController extends Controller
{

    public function __construct(){
        $this ->akun = new Akun();
    }

    // dashboard
    public function index(){
        if(!session('login')){
            return redirect('/');
        }else{
        return view('admin.dashboard');
    }
}


}
