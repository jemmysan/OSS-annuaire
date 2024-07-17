<?php

namespace App\Http\Controllers;



use PDO;
use App\Models\Phase;
use App\Models\Startup;
use App\Models\Commentaire;
use App\Models\Financement;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\StartupsExport;
use App\Imports\StartupsImport;
use App\Models\EvolutionStartup;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class StartupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index(Request $request)
    {
        try {
            $user = Auth::user();

            if (Gate::allows('porteur-projet', $user)) {
                $startups = Startup::whereHas('user', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->where('nom_startup', '!=', null)->orderBy('id', 'desc')->paginate(6);

                return view('startup.index', compact('startups'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
            }

            $startups = Startup::with('phase', 'secteur', 'commentaires')->get();

            $startups = Startup::where([
                ['nom_startup', '!=', null],
                [function ($query) use ($request) {
                    if (($nom = $request->nom)) {
                        $query->orWhere('nom_startup', 'LIKE', '%' . $nom . '%');
                    }
                }]
            ])->orderBy("id", "desc")->paginate(6);

            return view('startup.index', compact('startups'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
            //  'total_startups', 'contact_count', 'discussion_count', 'pilotage_count', 'deploiement_count'))

        } catch (\Exception $e) {
            Log::error('Error in index method: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    
    
    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $tags = \App\Models\Tag::pluck('name', 'id');
       $secteurs = \App\Models\Secteur::pluck('secteur', 'id');
       return view('startup.create', compact('tags','secteurs'));

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
            'nom_startup'=> 'required|unique:startups',
            'description'=> 'required',
            'partenariat_orange'=> 'required',
            'date_creation'=> 'required',
            'ceo_co_fondateur'=> 'required',
            'adresses'=> 'required',
            'logo' => 'required|mimes:jpg,png,jpeg|max:2048',
            'site_web'=> '',
            'email'=> 'required||email|unique:startups',
            'referent'=> 'required',
            'filename' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
            'video'=> 'required',
            'leve_fond'=> 'required',
            'montant_fonds'=> '',
            'date_leve_fond'=> '',
            'coordonnee'=> 'required',
            'statut'=> 'required',
            'autre_part'=> 'required',


        ]);

        $logoNom = time().'.'.$request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('img'),  $logoNom);

        $fileNom = 'fichier_'.time().'.'.$request->filename->getClientOriginalExtension();
        $request->filename->move(public_path('fichier'),  $fileNom);


        $startup = Startup::create(
            ['nom_startup'=> $request->input('nom_startup'),
            'description'=> $request->input('description'),
            'partenariat_orange'=> $request->input('partenariat_orange'),
            'date_creation'=> $request->input('date_creation'),
            'ceo_co_fondateur'=> $request->input('ceo_co_fondateur'),
            'adresses'=> $request->input('adresses'),
            'logo'=> $logoNom,
            'filename'=> $fileNom,
            'video'=> $request->input('video'),
            'site_web'=> $request->input('site_web'),
            'email'=> $request->input('email'),
            'referent'=> $request->input('referent'),
            'coordonnee'=> $request->input('coordonnee'),
            'statut'=> $request->input('statut'),
                'leve_fond'=> $request->input('leve_fond'),
                'montant_fonds'=> $request->input('montant_fonds'),
                'date_leve_fond'=> $request->input('date_leve_fond'),
                'user_id'=>auth()->user()->id,
                'autre_part'=> $request->input('autre_part')


            ]);
        $startup->tag()->sync((array)$request->input('tag'));
        $startup->secteur()->sync((array)$request->input('secteur'));



        return redirect()->route('startup.index')
            ->with('success','Start-up créé avec succés.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Startup   $startup
     * @return \Illuminate\Http\Response
     */
    public function show(Startup $startup)
    {
        return view('startup.show',compact('startup'));
    }

    /**
     * @param \App\Models\Startup $startup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = \App\Models\Tag::pluck('name', 'id');
        $secteurs = \App\Models\Secteur::pluck('secteur', 'id');
        $startup = Startup::findOrFail($id);

        return view('startup.edit',compact('tags','secteurs','startup')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Startup $startup)
    {
        request()->validate([
            'nom_startup'=> 'required',
            'description'=> 'required',
            'partenariat_orange'=> 'required',
            'date_creation'=> 'required',
            'ceo_co_fondateur'=> 'required',
            'adresses'=> 'required',
            'logo' => 'required|mimes:jpg,png,jpeg|max:2048',
            'site_web'=> '',
            'email'=> 'required||email',
            'referent'=> '',
            'filename' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:2048',
            'video'=> '',
            'leve_fond'=> 'required',
            'montant_fonds'=> '',
            'date_leve_fond'=> '',
            'coordonnee'=> 'required',
            'statut'=> 'required',
            'autre_part'=> 'required',
        ]);
         $newlogoNom = time().'.'.$request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('img'),  $newlogoNom);

         $newfileNom = 'fichier_'.time().'.'.$request->filename->getClientOriginalExtension();
        $request->filename->move(public_path('fichier'),  $newfileNom);



        $startup->update(
                ['nom_startup'=> $request->input('nom_startup'),
                    'description'=> $request->input('description'),
                    'partenariat_orange'=> $request->input('partenariat_orange'),
                    'date_creation'=> $request->input('date_creation'),
                    'ceo_co_fondateur'=> $request->input('ceo_co_fondateur'),
                    'adresses'=> $request->input('adresses'),
                    'filename'=> $newfileNom,
                    'logo'=> $newlogoNom,
                    'video'=> $request->input('video'),
                    'site_web'=> $request->input('site_web'),
                    'email'=> $request->input('email'),
                    'coordonnee'=> $request->input('coordonnee'),
                    'statut'=> $request->input('statut'),
                    'leve_fond'=> $request->input('leve_fond'),
                    'montant_fonds'=> $request->input('montant_fonds'),
                    'date_leve_fond'=> $request->input('date_leve_fond'),
                    'referent'=> $request->input('referent'),
                    'user_id'=>auth()->user()->id,
                    'autre_part'=> $request->input('autre_part')

                ]);

         $startup->tag()->sync((array)$request->input('tag'));
         $startup->secteur()->sync((array)$request->input('secteur'));


        return redirect()->route('startup.index')
            ->with('success','Start-up modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $startup = Startup::findOrFail($id);
        try {
        
            Commentaire::where('startup_id', $id)->delete();
            Financement::where('startup_id', $id)->delete();
            Phase::where('startup_id', $id)->delete(); 
            EvolutionStartup::where('startup_id',$id)->delete();

            $startup->secteur()->detach();
            $startup->tag()->detach();
            
            $startup->delete();

            return redirect()->back()->with('success', 'Start-up supprimée avec succès');
        } catch (\Exception $e) {
            return back()->withError('Une erreur est survenue lors de la suppression de la start-up : ' . $e->getMessage());
        }
    }


    //enregistrer  phase
    public function save_phase(Request $request,$id){

        $request->startup_id=$id;

        Phase::updateOrCreate(
             ['startup_id' => $request->startup_id, 'id'=>$request->id],
             ['phase' =>  $request->phase],
        );

        return redirect('startup/'.$id)->with('success','Mise à jour effectuée');
    }


    public function like(Request $request)
    {
        $startup = Startup::find($request->startup);
        $value = $startup->like;
        $startup->like = $value+1;
        $startup->save();
        return back()->with('success','Merci');

    }

    public function recherche($id){
        return 1;
    }

    public function search(Request $request)
{
    $inputValue = $request->input('search');
    $user = Auth::user();

    if (Gate::allows('porteur-projet', $user)) {
        $startups = Startup::whereHas('user', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('nom_startup', 'like', '%' . $inputValue . '%')
          ->paginate(10);
          
        return view('startup.index', compact('startups'))
               ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    $startups = Startup::where('nom_startup', 'like', '%' . $inputValue . '%')
                        ->paginate(10);
    return view('startup.index', compact('startups'));
}



   
    
    
}
