<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function index()
    {
        return view('voiture/voiture');
    }

    public function indexNew()
    {
        return view('voiture/ajoutvoiture');
    }

    public function indexPoint()
    {
        return view('voiture/pointagevoiture');
    }

    public function indexListe()
    {
        return view('voiture/listevoiture');
    }
}
