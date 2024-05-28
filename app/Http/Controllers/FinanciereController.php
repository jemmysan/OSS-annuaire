<?php

namespace App\Http\Controllers;

use App\Models\Financiere;
use Illuminate\Http\Request;

class FinanciereController extends Controller
{  /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $financieres = Financiere::where([
                    ['nom_structure','!=', Null],
                    [ function($query) use ($request){
                        if(($nom = $request->nom)){
                            $query->orWhere('nom_structure','LIKE','%'.$nom.'%')->get();
                        }

                        }]
                    ])
                        ->orderBy("id","desc")
                        ->paginate(10);

            return view('financiere.index',compact('financieres'))
                ->with('i',(request()->input('page',1)-1)*10);

    }

  public function search(Request $request)
    {
        if($request->has('search')){
            $financiere = Financiere::search($request->get('search'))->get();
        }else{
            $financiere= Financiere::get();
        }


        return view('recherche', compact('financiere'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('financiere.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nom_structure' => 'required|unique:financieres',
            'description' => 'required',
            'partenariat_orange' => 'required',
            'nom_prenom_directeur' => 'required',
            'adresses' => 'required',
            'coordonnee' => 'required',
            'site_web' => 'required',
            'email' => 'required|email|unique:financieres',

        ]);

        Financiere::create([
            'nom_structure' => $request->input('nom_structure'),
            'description'=> $request->input('description'),
            'partenariat_orange'=> $request->input('partenariat_orange'),
            'adresses'=> $request->input('adresses'),
            'site_web'=> $request->input('site_web'),
            'email'=> $request->input('email'),
            'coordonnee'=> $request->input('coordonnee'),
            'nom_prenom_directeur'=> $request->input('nom_prenom_directeur'),
            'user_id'=>auth()->user()->id
        ]
        );

        return redirect()->route('financiere.index')
            ->with('success','Structure financiére créé avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Financiere  $financiere
     * @return \Illuminate\Http\Response
     */
    public function show(Financiere $financiere)
    {
        return view('financiere.show',compact('financiere'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Financiere  $financiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Financiere $financiere)
    {
        return view('financiere.edit',compact('financiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Financiere  $financiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Financiere $financiere)
    {
        request()->validate([
            'nom_structure' => 'required',
            'description' => 'required',
            'partenariat_orange' => 'required',
            'nom_prenom_directeur' => 'required',
            'adresses' => 'required',
            'coordonnee' => 'required',
            'site_web' => 'required',
            'email' => 'required|email',
        ]);

        $financiere->update([
            'nom_structure' => $request->input('nom_structure'),
            'description'=> $request->input('description'),
            'partenariat_orange'=> $request->input('partenariat_orange'),
            'adresses'=> $request->input('adresses'),
            'site_web'=> $request->input('site_web'),
            'email'=> $request->input('email'),
            'coordonnee'=> $request->input('coordonnee'),
            'nom_prenom_directeur'=> $request->input('nom_prenom_directeur'),
            'user_id'=>auth()->user()->id
        ]
        );

        return redirect()->route('financiere.index')
            ->with('success','Structure financiére mis à jour avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Financiere  $financiere
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Financiere $financiere)
    {
        $financiere->delete();

        return redirect()->route('financiere.index')
            ->with('success','Structure Financiére supprimée avec succés');

    }
}
