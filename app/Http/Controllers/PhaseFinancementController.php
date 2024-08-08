<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PhaseFinancement;

class PhaseFinancementController extends Controller
{
    public function index(){
        $phases = PhaseFinancement::paginate(10);
        return view('phase-financement.index',['phases'=>$phases]);
    }


    public function store(Request $request){
        request()->validate([
            'libelle'=>'required'
        ]);

        PhaseFinancement::create([
            'libelle'=>$request->input('libelle'),
        ]);

        return redirect()->back()->with('success','Phase de finacement ajoutée avec succès !'); 
    }

    public function update(Request $request,$id){
        request()->validate([
            'libelle'=>'required'
        ]);
        $phase = PhaseFinancement::findOrFail($id);
      
        $phase->update([
            'libelle'=>$request->input('libelle'),
        ]);
        return redirect()->back()->with('success','Phase de financement mis à jour avec succès !'); 
    }

    public function delete($id){
        $phase = PhaseFinancement::find($id);
        $phase->delete();
        return redirect()->back()->with('success','Phase de finacement ajoutée avec succès !'); 
        
    }

    public function search(Request $request)
    {
        $inputValue = $request->input('search');
        $phases = PhaseFinancement::where('libelle', 'like', '%' . $inputValue . '%')->paginate(10);
                                
        return view('phase-financement.index',['phases'=>$phases]);
    }
}
