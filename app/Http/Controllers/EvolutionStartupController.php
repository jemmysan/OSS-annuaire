<?php

namespace App\Http\Controllers;

use App\Models\Startup;
use App\Models\Evolution;
use Illuminate\Http\Request;
use App\Models\EvolutionStartup;
use PhpOffice\PhpSpreadsheet\IOFactory;

class EvolutionStartupController extends Controller
{
    
    public function index($id){
        $startupId = Startup::findOrFail($id)->id;
        return view('evolution.evolution-startup',compact('startupId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'ordre' => 'required',
            'description' => 'required',
            'filename' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
        ]);
    
        $fileNom = 'fichier_' . time() . '.' . $request->filename->getClientOriginalExtension();
        $request->filename->move(public_path('fichier'), $fileNom);
        // dd($request->all());
        EvolutionStartup::create([
            'evolution_id' => $request->input('libelle'),
            'startup_id' => $request->input('startupId'),
            'description' => $request->input('description'),
            'filename' => $fileNom,
        ]);
    
        return redirect()->back()->with('success', 'Evolution ajoutée avec succès');
    }

  
    public function update(Request $request, $id)
    {
        // return EvolutionStartup::find($id);
        $request->validate([
            'description' => 'required',
            'filename' => 'file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
        ]);
        
        $evolutionStartup = EvolutionStartup::find($id);
       
        if (!$evolutionStartup) {
            return redirect()->back()->with('error', 'Evolution not found.');
        }

        $evolutionStartup->description = $request->input('description');

        if ($request->hasFile('filename')) {
            $fileNom = 'fichier_' . time() . '.' . $request->filename->getClientOriginalExtension();
            $request->filename->move(public_path('fichier'), $fileNom);
            $evolutionStartup->filename = $fileNom;
        }

        $evolutionStartup->save();

        return redirect()->back()->with('success', 'Evolution updated successfully.');
    }

    
}
