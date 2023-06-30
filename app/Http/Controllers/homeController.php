<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class homeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard');
    }

    public function indexUser()
    {
        Alert::error('Compte désactiver', 'Veuillez contacter votre admin');
        redirect('/');
    }

    public function private()
    {
        if(Gate::allows('adminOnly', auth()->user()))
        {
            return view('dashboard');
        }
        else
        {
            return view('auth/login');
        }

    }
}
