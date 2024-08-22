<?php

namespace App\Http\Controllers;

use App\Models\Indicateur;
use App\Models\UniteMesure;
use Illuminate\Http\Request;

class UniteMesureController extends Controller
{
    public function index(){
        $mesures = UniteMesure::paginate(10);
        return view('mesure.index',['mesures'=>$mesures]);
    }


    public function store(Request $request){
        request()->validate([
            'libelle'=>'required|unique:unite_mesures',
            'symbole'=>'required|unique:unite_mesures'
        ]);

        UniteMesure::create([
            'libelle'=> $request->input('libelle'),
            'symbole'=> $request->input('symbole')
        ]);

        return redirect()->back()->with('success','Unité de mesure ajoutée avec succès !');
    }

    public function update(Request $request, $id){
        request()->validate([
            'libelle'=>'required|unique:unite_mesures',
            'symbole'=>'required|unique:unite_mesures'
        ]);

        $mesure = UniteMesure::where('id',$id)->first();
        $mesure->update([
            'libelle'=> $request->input('libelle'),
            'symbole'=> $request->input('symbole')
        ]);
        return redirect()->back()->with('success','Unité de mesure mis à jour avec succès !');
    }

    public function delete($id)
    {
        Indicateur::where('mesure_id',$id)->update(['mesure_id'=>null]);
        $mesure = UniteMesure::find($id);
        $mesure->delete();
        return redirect()->back()->with('success', 'Unité de mesure supprimée avec succès !');
    }


    public function search(Request $request)
    {
        $inputValue = $request->input('search');
        $mesures = UniteMesure::where('libelle', 'like', '%' . $inputValue . '%')->paginate(10);
                                
                                return view('mesure.index', ['mesures'=>$mesures]);
                   
    }
}
