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

        $this->suivies = StartupIndicateur::with(['startup', 'indicateur'])
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
                'date' => $item->date,
            ];
        })->values(); 
    }


    public function index(){
        $indicateurs = Indicateur::all();
        
        return view('startup-indicateur.index',
        [
            "indicateurs"=>$indicateurs,
            "startupIndicateurs"=>$this->suivies 
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
                'id' => $item->indicateur->id,
                'libelle' => $item->indicateur->libelle,
                'description' => $item->indicateur->description,
                'date' => $item->date,
                'unite_mesure' => $item->indicateur->mesure ? $item->indicateur->mesure->libelle . ' (' . $item->indicateur->mesure->symbole . ')' : 'Unité non précise',
                'value'=> $item->value
            ];
        });

        // Retourne les informations de la startup avec ses indicateurs
       $indicOfStartup = [
            'startup_id' => $startup->id,
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
        ]);

        StartupIndicateur::create([
            'startup_id' => $request->input('startup_id'),
            'indicateur_id'=> $request->input('indicateur_id'),
            'date'=> Carbon::now()->format('Y/m/d'),
            'value'=>10
        ]);

        return redirect()->back()->with('success','Indicateur ajouté avec succès !');

    }
    
}
