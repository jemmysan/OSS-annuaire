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
        // Validate form data
        $request->validate([
            'libelle' => 'required',
            'ordre' => 'required',
            'description' => 'required',
            'description_files' => 'array', // Make this optional if files are not always required
            'description_files.*' => 'file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800', // Validate individual files
        ]);

        $filenames = [];
        $storagePath = public_path('uploads/evolution_startup'); // Replace with your desired path

        // Create storage directory if it doesn't exist
        if (!is_dir($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        // Handle new files
        if ($request->hasFile('description_files')) {
            foreach ($request->file('description_files') as $file) {
                $fileNom = uniqid('fichier_') . '.' . $file->getClientOriginalExtension();
                $file->move($storagePath, $fileNom);
                $filenames[] = $fileNom;
            }
        }

        // Retrieve or create EvolutionStartup record
        $evolutionStartup = EvolutionStartup::where('evolution_id', $request->input('libelle'))
            ->where('startup_id', $request->input('startupId'))
            ->first();

        if ($evolutionStartup) {
            // Merge existing filenames with new ones
            $existingFilenames = $evolutionStartup->filenames;
            $allFilenames = array_merge($existingFilenames, $filenames);

            // Update existing record
            $evolutionStartup->update([
                'description' => $request->input('description'),
                'filename' => json_encode($allFilenames),
            ]);
        } else {
            // Create new record if it doesn't exist
            EvolutionStartup::create([
                'evolution_id' => $request->input('libelle'),
                'startup_id' => $request->input('startupId'),
                'description' => $request->input('description'),
                'filename' => json_encode($filenames),
            ]);
        }

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
