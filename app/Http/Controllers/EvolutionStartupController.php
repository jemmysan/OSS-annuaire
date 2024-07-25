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

    public function getEvolutionStartup($id)
    {
        $evolutionsStartups = EvolutionStartup::where('startup_id', $id)->get();

        $evolutionIds = $evolutionsStartups->pluck('evolution_id')->toArray();

        $ordreEvo = Evolution::whereIn('id', $evolutionIds)->get();

        $data = [
            "ordre" => $ordreEvo,
            "evolutions" => $evolutionsStartups
        ];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'libelle' => 'required',
                'description' => 'required|string',
                'filename' => 'required',
                'filename.*' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);
    
            $fileNames = [];
            if ($request->hasFile('filename')) {
                foreach ($request->file('filename') as $file) {
                    if ($file->isValid()) {
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->storeAs('public/files', $fileName);
                        $fileNames[] = $fileName;
                    } else {
                        throw new \Exception("Le fichier {$file->getClientOriginalName()} n'est pas valide.");
                    }
                }
            }
    
            $evolutionStartup = new EvolutionStartup();
            $evolutionStartup->evolution_id = $request->input('libelle');
            $evolutionStartup->startup_id = $request->input('startupId');
            $evolutionStartup->description = $request->input('description');
            $evolutionStartup->filename = $fileNames;
            $evolutionStartup->save();
    
            return redirect()->back()->with('success', 'Evolution startup ajouté avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur : ' . $e->getMessage())->withInput();
        }
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
