<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Startup;
use App\Models\Indicateur;
use Illuminate\Http\Request;
use App\Models\StartupIndicateur;
use App\Http\Resources\Resources\StartupIndicateurResource;

class StartupIndicateurController extends Controller
{
    public $suivies; 

    public function __construct(){

        $this->suivies = StartupIndicateur::with(['startup', 'indicateur.mesure'])
        ->get()
        ->groupBy('startup_id')
        ->map(function ($group) {
            return $group->sortByDesc('date')->first();
        })
        ->map(function ($item) {
            return [
                'id' => $item->id,
                'startup_id' => $item->startup_id,
                'nom_startup' => $item->startup->nom_startup, 
                'indicateur_id' => $item->indicateur_id,
                'libelle_indicateur' => $item->indicateur->libelle, 
                'symbole_mesure' => $item->indicateur->mesure->symbole, 
                'value'=>$item->value,
                'date' => $item->date,
            ];
        })->values(); 
    }


    public function index(){
        // return $this->suivies;
        $indicateurs = Indicateur::all();
        $startups = Startup::get()->map(function ($item){
                    return [
                        'id'=>$item->id,
                        'nom'=>$item->nom_startup
                    ];
                });
        
        return view('startup-indicateur.index',
        [
            "indicateurs"=>$indicateurs,
            "startupIndicateurs"=>$this->suivies,
            "startups"=>$startups
        ]);
    }

    public function show($id)
    {
         $startupIndicateurs = StartupIndicateur::with(['startup', 'indicateur.mesure'])
            ->where('startup_id', $id)
            ->get();

        // Si la startup existe
        if ($startupIndicateurs->isNotEmpty()) {
            $startup = $startupIndicateurs->first()->startup;

            // Obtenez tous les indicateurs associés à cette startup
            $indicateurs = $startupIndicateurs->map(function ($item) {
                return [
                    'id'=> $item->id,
                    'libelle' => $item->indicateur->libelle,
                    'description' => $item->indicateur->description,
                    'date' => $item->date,
                    'unite_mesure' => $item->indicateur->mesure ? $item->indicateur->mesure->symbole : 'Unité non précise',
                    'value'=> $item->value
                ];
            });

            // Retourne les informations de la startup avec ses indicateurs
         $indicOfStartup = [
                
                'nom_startup' => $startup->nom_startup,
                'indicateurs' => $indicateurs,
            
            ];
            
            return view('startup-indicateur.show', ["indicateurs" => $indicOfStartup]);
        }

        // Si aucune startup n'a été trouvée
        return redirect()->back()->with('error', 'Startup non trouvée.');
    }


    
    public function store(Request $request){

        request()->validate([
            'startup_id' =>'required',
            'indicateur_id'=>'required',
            'value'=>'required',
            'date'=>'required',
        ]);

        StartupIndicateur::create([
            'startup_id' => $request->input('startup_id'),
            'indicateur_id'=> $request->input('indicateur_id'),
            'date'=> $request->input('date'),
            'value'=>$request->input('value')
        ]);

        return redirect()->back()->with('success','Indicateur ajouté avec succès !');

    }


    public function update(Request $request,$id){
        request()->validate([
            'value' =>'required'
        ]);

        $startupIndicateur = StartupIndicateur::findOrFail($id);
        $startupIndicateur->update([
            'value'=>$request->value
        ]);
        return redirect()->back()->with('success','Indicateur modifié avec succès !');
    }

    public function delete($id){
        $startupIndicateur = StartupIndicateur::findOrFail($id);
        $startupIndicateur->delete();
        return redirect()->back()->with('success','Indicateur supprimé avec succès !');

    }
    
}
