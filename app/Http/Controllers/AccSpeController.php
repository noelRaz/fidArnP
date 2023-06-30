<?php

namespace App\Http\Controllers;

use App\Models\AccSpeModel;
use Illuminate\Http\Request;
use App\Models\PointExtModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AccSpeController extends Controller
{
   public function index()
   {
    $data_ext = AccSpeModel::paginate(10);
    return view('as.listeAS', compact('data_ext'));
   }

    public function externePoint()
    {
        return view('as/pointageAS');
    }

    public function deleteExt($id)
    {
        $datapersext = AccSpeModel::find($id);
        $datapersext ->delete();
        Alert::info('Suppression', 'Personnel supprimer avec succès');
        return redirect('listeAS');
    }

    public function addExt(Request $request)
    {
        $number = mt_rand(1000000000, 9999999999);
        $request['ext_code'] = $number;
        $ext = new AccSpeModel();
        $ext ->extNom = $request->input('extNom');
        $ext ->extPrenom = $request->input('extPrenom');
        $ext ->ext_code = $number;
        $ext ->extEmail = $request->input('extEmail');
        $ext ->extFonc = $request->input('extFonc');
        $ext ->extTel = $request->input('extTel');
        $ext -> save();
        if($ext){
            Alert::success('Félicitation', 'Personnel ajouter avec succès');
            return redirect('listeAS');
        }else{
            Alert::error('Erreur', 'Quelque chose s\'est mal passé');
            return redirect('listeAS');
        }
    }

    public function extCodeExists($number)
    {
        return AccSpeModel::whereExtCode($number)->exists();
    }

    public function indexPointExt()
    {
        $todayDate = Carbon::now();
        $data = DB ::table('pointage_os_as')
        ->Join('pers_ext', 'pointage_os_as.pointCodeExt', '=', 'pers_ext.ext_code')
        ->select('pers_ext.extNom', 'pers_ext.extPrenom', 'pers_ext.extFonc', 'pointage_os_as.pointCodeExt', 'pointage_os_as.created_at')
        ->whereDate('pointage_os_as.created_at', $todayDate)
        ->paginate(4);
        return view('as/pointageAS', compact('data'));
    }

    public function addExtPoint(Request $request)
    {
        $pointageExt = new PointExtModel();
        $pointageExt ->pointCodeExt = $request->input('extCode');

        if($pointageExt){
            $pointageExt->save();
            Alert::success('Félicitation', 'Personnel arriver avec succès');
            return redirect('pointAS');
        }else{
            Alert::error('Erreur', 'Quelque chose s\'est mal passé');
            return redirect('pointAS');
        }
    }

    public function detailExt($id)
    {
        $detail = AccSpeModel::find($id);
        $data = [
            'ext' => $detail,
        ];
        return view('as.detailExt', $data);
    }

    public function editExt($id)
    {
        $detail = AccSpeModel::find($id);
        $data = [
            'ext' => $detail,
        ];
        return view('as.editExt', $data);
    }

    public function updateExt(Request $request, $id)
    {
        $ext = AccSpeModel::find($id);
        $ext ->extNom = $request->input('extNom');
        $ext ->extPrenom = $request->input('extPrenom');
        $ext ->extEmail = $request->input('extEmail');
        $ext ->extFonc = $request->input('extFonc');
        $ext ->extTel = $request->input('extTel');

        $ext -> update();
        Alert::success('Modification', 'Personnel modifier avec succès');
        return redirect('listeAS');
    }
}
