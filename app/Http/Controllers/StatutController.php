<?php

namespace App\Http\Controllers;

use App\Models\Statut;
use Illuminate\Http\Request;

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


   public function delete(){

   }

    public function search(Request $request)
    {
        $inputValue = $request->input('search');
        $statuts = Statut::where('libelle', 'like', '%' . $inputValue . '%')
                                ->orderBy('ordre')->paginate(10);
                                
                                return view('phase.index', ['statuts'=>$statuts]);
                   
    }


}
