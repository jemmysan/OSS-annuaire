<?php

namespace App\Http\Controllers;

use App\Models\Indicateur;
use Illuminate\Http\Request;

class IndicateurController extends Controller
{
    public function index(){
        $indicateurs = Indicateur::paginate(10);
        return view('indicateur.index', ['indicateurs'=>$indicateurs]);
    }

   


    public function store(Request $request)
    {
        request()->validate([
            'libelle' => 'required|unique:indicateurs',
            'mesure_id' => 'required',
        ]);

        Indicateur::create([
            'libelle' => $request->input('libelle'),
            'mesure_id' => $request->input('mesure_id'),
            'description'=> $request->input('description')
        ]);

    
        return redirect()->back()->with('success','Indicateur créé avec succès !');
    }

   


    public function update(Request $request, $id)
    {
        request()->validate([
            'libelle' => 'required',
            'mesure_id' => 'required',
        ]);

        $indicateur = Indicateur::find($id);
        $indicateur->update([
            'libelle' => $request->input('libelle'),
            'mesure_id' => $request->input('mesure_id'),
            'description'=> $request->input('description')
        ]);

        return redirect()->back()->with('success','Indicateur modifié avec succès !');

    }


    public function delete($id){
        Indicateur::find($id)->delete();
        return redirect()->back()->with('success','Indicateur supprimé avec succès !');
    }
    

    public function search(Request $request)
    {
        $inputValue = $request->input('search');
        $indicateurs = Indicateur::where('libelle', 'like', '%' . $inputValue . '%')->paginate(10);
                                
        return view('indicateur.index', ['indicateurs'=>$indicateurs]);
    }

}
