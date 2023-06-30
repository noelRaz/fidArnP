<?php

namespace App\Http\Controllers;

use App\Models\PersModel;
use Illuminate\Http\Request;
use App\Models\PointPersModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PointPersController extends Controller
{
    public function indexPoint()
    {
        $todayDate = Carbon::now();
        $data = DB ::table('pointage_pers')
        ->Join('pers', 'pointage_pers.pointCodePers', '=', 'pers.pers_code')
        ->select('pers.persNom', 'pers.persPrenom', 'pers.persFonc', 'pointage_pers.pointCodePers', 'pointage_pers.created_at')
        ->whereDate('pointage_pers.created_at', $todayDate)
        ->paginate(4);
        return view('personnel/pointagePers', compact('data'));
    }


    public function addPointPers(Request $request)
    {
        $pointage = new PointPersModel();
        $pointage ->pointCodePers = $request->input('persCode');

        if($pointage){
            $pointage->save();
            Alert::success('Félicitation', 'Personnel arriver avec succès');
            return redirect('pointpersonnel');
        }else{
            Alert::error('Erreur', 'Quelque chose s\'est mal passé');
            return redirect('pointpersonnel');
        }
    }
}
