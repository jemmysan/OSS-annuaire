<?php

namespace App\Http\Controllers;

use App\Models\Rubrique;
use Illuminate\Http\Request;

class RubriqueController extends Controller
{
   public function index(){

        $rubriques = Rubrique::all();
        return view('rubrique.index', compact('rubriques'))
                ->with('i',(request()->input('page',1)-1)*10);
   }

   public function store(Request $request){
        request()->validate([
            'libelle'=>'required',
            'description'=> 'required',
            'ordre'=>'required|numeric'
        ]);

        Rubrique::create([
            'libelle'=>$request->input('libelle'),
            'description'=>$request->input('description'),
            'ordre'=>$request->input('ordre')
        ]);
        return redirect()->back()->with('success','Rubrique ajoutée avec succès !');    
   }

    public function update(Request $request, $id){
        
        request()->validate([
            'libelle'=>'required',
            'description'=> 'required',
            'ordre'=>'required|numeric'
        ]);
        $rubrique = Rubrique::findOrFail($id);
        $rubrique->update([
            'libelle'=>$request->input('libelle'),
            'description'=>$request->input('description'),
            'ordre'=>$request->input('ordre')
        ]);
        return redirect()->back()->with('message','Rubrique modifier avec succès !');
    }

    public function delete($id){
        $rubrique = Rubrique::findOrFail($id)->delete(); 
        return redirect()->back()->with('message','Rubrique supprimée avec succès !');
    }

}
