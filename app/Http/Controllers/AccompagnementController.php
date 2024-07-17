<?php

namespace App\Http\Controllers;

use App\Models\Accompagnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AccompagnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         $data = Accompagnement::where([
                    ['nom_structure','!=', Null],
                    [ function($query) use ($request){
                        if(($nom = $request->nom)){
                            $query->orWhere('nom_structure','LIKE','%'.$nom.'%')->get();
                        }

                        }]
                    ])
                        ->orderBy("id","desc")
                        ->paginate(10);

            return view('accompagnement.index',compact('data'))
                ->with('i',(request()->input('page',1)-1)*10);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accompagnement.create');
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
            'nom_structure' => 'required|unique:accompagnements',
            'description' => 'required',
            'partenariat_orange' => 'required',
            'nom_prenom_directeur' => 'required',
            'adresses' => 'required',
            'coordonnee' => 'required',
            'site_web' => 'required',
            'email' => 'required|email|unique:accompagnements',

        ]);

        Accompagnement::create([
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

        return redirect()->route('accompagnement.index')
            ->with('success','Structure accompagnement  créé avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accompagnement  $accompagnement
     * @return \Illuminate\Http\Response
     */
    public function show(Accompagnement $accompagnement)
    {
        return view('accompagnement.show',compact('accompagnement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accompagnement  $accompagnement
     * @return \Illuminate\Http\Response
     */
    public function edit(Accompagnement $accompagnement)
    {
        return view('accompagnement.edit',compact('accompagnement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accompagnement  $accompagnement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accompagnement $accompagnement)
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

        $accompagnement->update([
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

        return redirect()->route('accompagnement.index')
            ->with('success','Structure accompagnement mis à jour avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \ int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $accompagnement = Accompagnement::findOrFail($id);
        $accompagnement->delete();
        return redirect()->route('accompagnement.index')
            ->with('success','Structure supprimée avec succés');
    }

    public function search(Request $request)
    {
        $inputValue = $request->input('search');
        $data = Accompagnement::where([
            ['nom_structure', 'like', '%' . $inputValue . '%'],
            [ function($query) use ($request){
                if(($nom = $request->nom)){
                    $query->orWhere('nom_structure','LIKE','%'.$nom.'%')->get();
                }

                }]
            ])
                ->orderBy("id","desc")
                ->paginate(10);

        return view('accompagnement.index',compact('data'))
        ->with('i',(request()->input('page',1)-1)*10);   
    }


}
