<?php

namespace App\Http\Controllers;

use App\Models\Secteur;
use Illuminate\Http\Request;

class SecteurController extends Controller
{
    public function index(){
        $secteurs = Secteur::paginate(10);
        return view('secteur.index', ['secteurs'=>$secteurs]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'secteur' => 'required|unique:secteurs',
           
        ]);

        Secteur::create([
            'secteur' => $request->input('secteur'),
        ]);
        return redirect()->route('secteur.index')
            ->with('success','Secteur créée avec succès');
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'secteur' => 'required',
        ]);

        Secteur::where('id',$id)
                ->update([
                    'secteur' => $request->input('secteur')
                ]);

        return redirect()->route('secteur.index')
            ->with('success','Secteur mis à jour avec succés');
    }

    public function destroy($id)
    {
        $secteur = Secteur::findOrFail($id);
        $secteur->startup()->detach();
        $secteur->delete();

        return redirect()->back()->with('success','Secteur supprimé avec succés');
    }

    public function search(Request $request)
    {
        $inputValue = $request->input('search');
        $secteurs = Secteur::where('secteur', 'like', '%' . $inputValue . '%')
                            ->paginate(10);
    
        return view('secteur.index', ['secteurs' => $secteurs]);
    }
    
    
}
