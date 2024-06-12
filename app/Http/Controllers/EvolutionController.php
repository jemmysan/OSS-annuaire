<?php

namespace App\Http\Controllers;

use App\Models\Evolution;
use Illuminate\Http\Request;

class EvolutionController extends Controller
{
    public function index(){
        return view('evolution.index');
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
        return $evolution;

        return redirect()->route('evolution')
            ->with('success','Structure financiére créé avec succés');
    }
}
