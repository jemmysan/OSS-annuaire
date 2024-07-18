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
            'description_files' => 'required|array',  // Validate for an array of files
            'description_files.*' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800', // Validation for each file
        ]);

        $filenames = [];
        $storagePath = public_path('uploads/evolution_startup'); // Replace with desired path

        // Create storage directory if it doesn't exist
        if (!is_dir($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        // Handle new files
        if ($request->hasFile('description_files')) {
            foreach ($request->file('description_files') as $file) {
                $fileNom = uniqid('fichier_') . '.' . $file->getClientOriginalExtension();
                $file->move($storagePath, $fileNom); // Store in 'uploads/evolution_startup' directory
                $filenames[] = $fileNom;
            }
        }

        // Retrieve existing EvolutionStartup record if it exists
        $evolutionStartup = EvolutionStartup::where('evolution_id', $request->input('libelle'))
            ->where('startup_id', $request->input('startupId'))
            ->first();

        if ($evolutionStartup) {
            // Merge new filenames with existing ones
            $existingFilenames = $evolutionStartup->filenames;
            $allFilenames = array_merge($existingFilenames, $filenames);

            // Update the existing record
            $evolutionStartup->update([
                'description' => $request->input('description'),
                'filename' => json_encode($allFilenames),
            ]);
        } else {
            // Create a new record if it doesn't exist
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
