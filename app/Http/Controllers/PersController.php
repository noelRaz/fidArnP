<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use App\Models\PersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PersController extends Controller
{
    /*public function __construct()
    {
        //$this->PersModel = new PersModel();
        $this->PersModel = new PersModel();
    }*/
    public function index()
    {
        return view('personnel/pers');
    }

    public function indexNew()
    {
        return view('personnel/ajoutPers');
    }

    public function indexPoint()
    {
        return view('personnel/pointagePers');
    }

    public function persListe()
    {
        $data = PersModel::paginate(10);
        return view('personnel/listePers', compact('data'));
    }

    public function add(Request $request)
    {
        $number = mt_rand(1000000000, 9999999999);
        $request['pers_code'] = $number;
        $pers = new PersModel();
        $pers ->persNom = $request->input('persNom');
        $pers ->persPrenom = $request->input('persPrenom');
        $pers ->pers_code = $number;
        $pers ->persEmail = $request->input('persEmail');
        $pers ->persFonc = $request->input('persFonc');
        $pers ->persTel = $request->input('persTel');
        $pers -> save();
        if($pers){
            Alert::success('Félicitation', 'Personnel ajouter avec succès');
            return redirect('listepersonnel');
        }else{
            Alert::error('Erreur', 'Quelque chose s\'est mal passé');
            return redirect('listepersonnel');
        }
    }

    public function persCodeExists($number)
    {
        return persmodel::wherePersCode($number)->exists();
    }

    public function delete($id)
    {
        $datapers = PersModel::find($id);
        $datapers ->delete();
        Alert::info('Suppression', 'Personnel supprimer avec succès');
        return redirect('listepersonnel');
    }

    public function edit($id)
    {
        $detail = PersModel::find($id);
        $data = [
            'pers' => $detail,
        ];
        return view('personnel.editPers', $data);
    }

    public function detail($id)
    {
        $detail = PersModel::find($id);
        $data = [
            'pers' => $detail,
        ];
        return view('personnel.detailPers', $data);
    }
    public function update(Request $request, $id)
    {
        $pers = PersModel::find($id);
        $pers ->persNom = $request->input('persNom');
        $pers ->persPrenom = $request->input('persPrenom');
        $pers ->persEmail = $request->input('persEmail');
        $pers ->persFonc = $request->input('persFonc');
        $pers ->persTel = $request->input('persTel');

        $pers -> update();
        Alert::success('Modification', 'Personnel modifier avec succès');
        return redirect('listepersonnel');
    }

    public function validationQRCode(Request $request)
    {
        dd($request->qr_code);
    }

    public function pointagePers(Request $request)
    {
        $resultat = 0;
        if ($request->data){
            $pers = PersModel:: where('pers_code', $request->data)->first();
            if ($pers){
                //ajout
                $resultat = 1;
            }
            else
            {
                $resultat = 0;
            }
        }
        return $resultat;
    }

    public function exportPDF()
    {
        /*$pers = PersModel::all();

        view()->share('data', $pers);
        $pdf = PDF::loadview('personnel/fdetail');
        return $pdf->download('data.pdf');*/
    }

}
