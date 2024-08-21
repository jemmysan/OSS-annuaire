<?php

namespace App\Http\Controllers;

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
        $mesure = UniteMesure::find($id);
        
        // Dissocier ou supprimer les indicateurs associés avant de supprimer l'unité de mesure
        foreach ($mesure->indicateur as $indicateur) {
            // Vous pouvez soit les dissocier (mettre à jour la mesure_id à null par exemple)
            $indicateur->mesure_id = null;
            $indicateur->save();
            
            // Ou vous pouvez les supprimer
            // $indicateur->delete();
        }
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
