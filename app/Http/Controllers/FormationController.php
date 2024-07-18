<?php

namespace App\Http\Controllers;

use DOMDocument;
use App\Models\Rubrique;
use App\Models\Formation;
use Illuminate\Http\Request;


class FormationController extends Controller
{
   public function index()
   {
        $rubriques = Rubrique::all();
        $formations = Formation::all()->groupBy('rubrique_id');

            foreach ($formations as $rubriqueId => $formationGroup) {
                foreach ($formationGroup as $formation) {
                    $formation->content = html_entity_decode($formation->content);
                }
            }
            return view('formations.index', compact('rubriques', 'formations'));
    }

    public function coursIndex($id){
        $cours = Formation::where('id',$id)->first();
       
        return  view('formations.cours.show',compact('cours'));
        $cours = Formation::where('id',$id)->first();
        // $cours->content  = html_entity_decode($cours->content);
        return view('formations.cours.show',compact('cours'));
    }

    public function coursStoreView(){
        return view('formations.cours.create');
    }
    public function coursStore(Request $request){
        request()->validate([
            'rubrique'=>'required',
            'title'=>'required',
        ]);

        $content = $request->content;
        $dom = new DOMDocument();
        $dom->loadHTML($content,9);
        $content= $dom->saveHTML();

        Formation::create([
            'rubrique_id'=>$request->input('rubrique'),
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'lien_video'=>$request->input('video'),

        ]);
        return redirect()->back()->with('message','Cours ajouté avec succès');
    }

    public function viewUpdateCours($id){
        $cours = Formation::where('id',$id)->first();
        return  view('formations.cours.update',compact('cours'));
    }

    public function updateCours(Request $request ,$id){
        request()->validate([
            'title'=>'required',
        ]);

        $content = $request->content;
        $dom = new DOMDocument();
        $dom->loadHTML($content,9);
        $content= $dom->saveHTML();

        $cours = Formation::find($id);
        
        $cours->update([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'lien_video'=>$request->input('video')
        ]);
        return redirect()->back()->with('message','Cours mis a jour avec succès');        
    }


    public function destroyCours($id){
        $cours = Formation::find($id);
        $cours->delete();
        return redirect()->back()->with('message', 'Cours supprimée avec succès !');
    }


}
