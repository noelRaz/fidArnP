<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UtilisateurController extends Controller
{
    public function index()
    {
        $data = User::paginate(10);
        return view('utilisateur/utilisateur', compact('data'));
    }

    public function deleteUser($id)
    {
        $datapers = User::find($id);
        $datapers ->delete();
        Alert::info('Suppression', 'Utilisateur supprimer avec succès');
        return redirect('utilisateur');
    }

    public function activeUser(Request $request, $id)
    {
        $user = User::find($id);
        $user ->role = 1;

        $user -> update();
        return redirect('utilisateur');
    }

    public function desactiveUser(Request $request, $id)
    {
        $user = User::find($id);
        $user ->role = 0;

        $user -> update();
        return redirect('utilisateur');
    }
}
