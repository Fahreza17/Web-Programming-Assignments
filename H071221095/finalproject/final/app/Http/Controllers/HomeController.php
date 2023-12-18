<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() 
    {
        if(Auth::id())
        {
            $usertype=Auth()->user()->role;

            if($usertype=='pasien')
            {
                return redirect()->route('dashboard');
            }

            else if($usertype=='admin')
            {
                return view('admin.adminhome');
            }

            else if($usertype=='dokter')
            {
                return view('dokter.doctorhome');
            }

            else
            {
                return redirect()->back();
            }
        }
    }
}
