<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use App\Models\Startup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhaseController extends Controller
{

    public function index(Request $request)
    {
        return view('phase.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phase = new Phase();
        $phase->phase= $request->get('phase');
        $startup = Startup::find($request->startup_id);
        $startup->phase()->save($phase);


        return redirect()->back()->with('success','Phase créée!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function edit(Phase $phase)
    {
        return view('phase.edit',compact('phase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phase $phase)
    {
        request()->validate([
            'phase' => 'required',
            'startup_id' => 'required',

        ]);

        $phase->update([
                'phase'  => $request->input('phase'),
                'startup_id'=> $request->input('startup_id'),
            ]
        );


        return redirect()->with('success','Mise à jour réussie');
    }

}
