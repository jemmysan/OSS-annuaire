<?php

namespace App\Http\Controllers;

use App\Models\Statut;
use Illuminate\Http\Request;
use App\Models\StatutStartup;

class StatutController extends Controller
{
    public function index(){
        $statuts = Statut::orderBy('ordre')->paginate(10);
        return view('phase.index', ['statuts'=>$statuts]);
    }


    public function store(Request $request)
    {
        request()->validate([
            'libelle' => 'required|unique:statuts',
            'ordre' => 'required',
        ]);

        $ordre  = $request->input('ordre');

        Statut::where('ordre','>=',$ordre)
                    ->increment('ordre',1);

        Statut::create([
            'libelle' => $request->input('libelle'),
            'ordre'=>$ordre
        ]);

        $reupdateStatuts = Statut::orderBy('ordre')->get();
        foreach ($reupdateStatuts as $index => $statut) {
            $statut->update(['ordre' => $index + 1]);
        }
        return redirect()->route('statut.index')
            ->with('success','Statut créée avec succès');
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'libelle' => 'required',
            'ordre' => 'required',
        ]);

        $ordre  = $request->input('ordre');
        
        Statut::where('ordre','>=',$ordre)
                    ->increment('ordre',1);

        Statut::where('id',$id)
                ->update([
                    'libelle' => $request->input('libelle'),
                    'ordre' => $request->input('ordre'),
                ]);

                $reupdateStatuts = Statut::orderBy('ordre')->get();
                foreach ($reupdateStatuts as $index => $statut) {
                    $statut->update(['ordre' => $index + 1]);
                }

        return redirect()->route('statut.index')
            ->with('success','Statut mis à jour avec succés');
    }


    public function delete($id)
{
    $statut = Statut::findOrFail($id);
    $ordreToDelete = $statut->ordre;

    // Delete related records in statut_startups
    StatutStartup::where('statut_id', $id)->delete();
    
    // Delete the statut
    $statut->delete();

    // Reorder the remaining statuts
    Statut::where('ordre', '>', $ordreToDelete)
          ->decrement('ordre', 1);

    // Optionally, you can reupdate all the ordres to be sure everything is in order
    $reupdateStatuts = Statut::orderBy('ordre')->get();
    foreach ($reupdateStatuts as $index => $statut) {
        $statut->update(['ordre' => $index + 1]);
    }

    return redirect()->back()->with('success', 'Statut supprimé avec succès');
}

    


    public function search(Request $request)
    {
        $inputValue = $request->input('search');
        $statuts = Statut::where('libelle', 'like', '%' . $inputValue . '%')
                                ->orderBy('ordre')->paginate(10);
                                
                                return view('phase.index', ['statuts'=>$statuts]);
                   
    }

    public function saveStatutStartup(Request $request, $startupId)
    {
        $statut = $request->input('statut');
        $statutId = Statut::where('libelle', $statut)->first()->id;

        $statutStartup = StatutStartup::where('startup_id', $startupId)
                                    ->first();

        if ($statutStartup) {
            $statutStartup->update([
                'statut_id' => $statutId,
                'startup_id' => $startupId
            ]);
            return redirect()->back()->with('success', 'Statut de la startup mis à jour avec succès');
        }

        StatutStartup::create([
            'statut_id' => $statutId,
            'startup_id' => $startupId
        ]);

        return redirect()->back()->with('success', 'Statut de la startup ajouté avec succès');
    }


}
