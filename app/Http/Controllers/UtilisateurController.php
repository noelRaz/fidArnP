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

    public function editUser($id)
    {
        $detail = User::find($id);
        $data = [
            'user' => $detail,
        ];
        return view('utilisateur.editUser', $data);
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user ->admin = $request->input('userAdmin');
        $user ->role = $request->input('userEtat');


        $user -> update();
        Alert::success('Modification', 'Utilisateur modifier avec succès');
        return redirect('utilisateur');
    }
}
