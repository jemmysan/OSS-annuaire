<?php

namespace App\Http\Controllers;

use App\Models\Evolution;
use Illuminate\Http\Request;

class EvolutionController extends Controller
{
    public function index(){
        $evolutions = Evolution::get();
        return view('evolution.index', compact('evolutions'))
                ->with('i',(request()->input('page',1)-1)*10);;
    }

    public function create(){
        return view('evolution.create');
    }


    public function store(Request $request)
    {
        request()->validate([
            'libelle' => 'required|unique:evolutions',
            'ordre' => 'required',
        ]);
       
        $evolution = Evolution::create([
            'libelle' => $request->input('libelle'),
            'ordre'=>$request->input('ordre'),
            'description'=> $request->input('description'),  
            'user_id'=>auth()->user()->id
        ]);

        return redirect()->route('evolution')
            ->with('success','Evolution créée avec succès');
    }

    public function edit($id)
    {
        $evolution = Evolution::where('id',$id)->first();
        return view('evolution.edit',compact('evolution'));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'libelle' => 'required',
            'ordre' => 'required',
            'description' => 'required',
        ]);

        Evolution::where('id',$id)
                ->update([
                    'libelle' => $request->input('libelle'),
                    'ordre' => $request->input('ordre'),
                    'description'=> $request->input('description'),
                    'user_id'=>auth()->user()->id
                ]);

        return redirect()->route('evolution')
            ->with('success','evolution mis à jour avec succés');
    }

    public function destroy($id){
       Evolution::findOrFail($id)->delete();
       return redirect()->route('evolution')
                        ->with('success','evolution supprimer avec success');
    }
}
