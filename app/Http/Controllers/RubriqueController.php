<?php

namespace App\Http\Controllers;

use App\Models\Rubrique;
use App\Models\Formation;
use Illuminate\Http\Request;

class RubriqueController extends Controller
{
    public function index()
    {
        $rubriques = Rubrique::orderBy('ordre')->get();
        return view('rubrique.index', compact('rubriques'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
    }

   

   public function store(Request $request){
        request()->validate([
            'libelle'=>'required',
            'description'=> 'required',
            'ordre'=>'required|numeric'
        ]);
        $ordre = $request->input('ordre');
        Rubrique::where('ordre','>=',$ordre)
                    ->increment('ordre',1);

        Rubrique::create([
            'libelle'=>$request->input('libelle'),
            'description'=>$request->input('description'),
            'ordre'=>$ordre
        ]);

        $reupdateRubriques = Rubrique::orderBy('ordre')->get();
        foreach ($reupdateRubriques as $index => $rubrique) {
            $rubrique->update(['ordre' => $index + 1]);
        }
        
        return redirect()->back()->with('success','Rubrique ajoutée avec succès !');    
   }

    public function update(Request $request, $id){
        
        request()->validate([
            'libelle'=>'required',
            'description'=> 'required',
            'ordre'=>'required|numeric'
        ]);
        $rubrique = Rubrique::findOrFail($id);

        $ordre = $request->input('ordre');
        Rubrique::where('ordre','>=',$ordre)
                    ->increment('ordre',1);

        $rubrique->update([
            'libelle'=>$request->input('libelle'),
            'description'=>$request->input('description'),
            'ordre'=>$ordre
        ]);

        $reupdateRubriques = Rubrique::orderBy('ordre')->get();
        foreach ($reupdateRubriques as $index => $rubrique) {
            $rubrique->update(['ordre' => $index + 1]);
        }
        return redirect()->back()->with('message','Rubrique modifier avec succès !');
    }

    public function delete($id)
    {
        $rubrique = Rubrique::findOrFail($id);
        try {
           
            $rubrique->formation()->delete();

            $rubrique->delete(); 
    
            // Réordonner les rubriques restantes
            $reupdateRubriques = Rubrique::orderBy('ordre')->get();
            foreach ($reupdateRubriques as $index => $rubrique) {
                $rubrique->update(['ordre' => $index + 1]);
            }
    
            return redirect()->back()->with('message', 'Rubrique supprimée avec succès !');
    
        } catch (\Exception $e) {
            return back()->withErrors('Une erreur est survenue lors de la suppression de la rubrique : ' . $e->getMessage());
        }
    }
    

}
