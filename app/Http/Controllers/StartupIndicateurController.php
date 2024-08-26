<?php

namespace App\Http\Controllers;

use App\Models\Indicateur;
use Illuminate\Http\Request;
use App\Models\StartupIndicateur;

class StartupIndicateurController extends Controller
{
    public function index(){
        $indicateurs = Indicateur::all();
        $startupIndicateurs = StartupIndicateur::paginate(10);
        
        return view('startup-indicateur.index',
        [
            "indicateurs"=>$indicateurs,
            "startupIndicateurs"=>$startupIndicateurs 
        ]);
    }

    public function show(){
        return view('startup-indicateur.show');
    }

    public function store(Request $request){

        request()->validate([
            'startup_id' =>'required',
            'indicateur_id'=>'required',
        ]);

        StartupIndicateur::create([
            'startup_id' => $request->input('startup_id'),
            'indicateur_id'=> $request->input('indicateur_id'),
            'date'=>"2023/06/20"
        ]);

        return redirect()->back()->with('success','Indicateur ajouté avec succès !');

    }
    
}
