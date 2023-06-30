<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiteurModel;
use RealRashid\SweetAlert\Facades\Alert;

class VisiteurController extends Controller
{
    public function visiteur()
    {
        return view('visiteur.visiteur');
    }

    public function listeVisiteur()
    {
        return view('visiteur/ajoutvisiteur');
    }

    public function addVisi(Request $request)
    {
        $visi = new VisiteurModel();
        $visi ->visiNom = $request->input('visiNom');
        $visi ->visiPrenom = $request->input('visiPrenom');
        $visi ->visiCIN = $request->input('visiCIN');
        $visi ->visiTel = $request->input('visiTel');
        $visi ->visiPers = $request->input('visiPers');

        if($visi){
            $visi -> save();
            Alert::success('Félicitation', 'Visiteur ajouter avec succès');
            return redirect('listeAS');
        }else{
            Alert::error('Erreur', 'Quelque chose s\'est mal passé');
            return redirect('visiteur');
        }
    }
}
