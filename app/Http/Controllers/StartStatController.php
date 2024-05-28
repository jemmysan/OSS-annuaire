<?php

namespace App\Http\Controllers;

use App\Models\Financement;
use App\Models\Startup;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StartStatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
//startup registree dans l'année /mois OK
        $startup = Startup::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $months=Startup::select(DB::raw("Month(created_at) as month" ))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        $datas=array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index=>$month){
            $datas[$month]=$startup[$index];
        }

//pie secteur d'activite / startup
        $result = DB::select(DB::raw("SELECT s.secteur as secteur, count(st.id) as total FROM startup_secteur as st , secteurs as s WHERE s.id=st.secteur_id group by s.secteur"));
        /*  $result= DB::table('secteurs as s')
        /*        ->select(
                     DB::raw('s.secteur as secteur'),
                     DB::raw('count(st.id) as total') )
                 ->leftJoin('startup_secteur as st', 's.id', '=', 'st.secteur_id')
                 ->groupBy('nom')
                 ->get();*/
        $data="";
        foreach ($result as $val )
        {
            $data.="['".$val->secteur."',    ".$val->total."],";

        }
        $chartData=$data;


 // bar char financement /secteur
      $sect=DB::select("SELECT s.secteur as secteur FROM startup_secteur as ss, secteurs as s , financements as f, startups as st WHERE s.id = ss.secteur_id and f.startup_id= st.id GROUP by s.secteur");

        $fin=DB::select("SELECT SUM(f.montant + st.montant_fonds) finance FROM startup_secteur as ss, secteurs as s , financements as f, startups as st WHERE s.id = ss.secteur_id and f.startup_id= st.id GROUP by s.secteur");
        $dataS="";
            $dataF="";
        foreach ($sect as $val )
        {
            $dataS.="['".$val->secteur."'],";

        }
        foreach ($fin as $val )
        {
            $dataF.="['".$val->finance."'],";

        }
//     $resultat=DB::select(" SELECT s.secteur as secteur, SUM(f.montant + st.montant_fonds) finance FROM startup_secteur as ss, secteurs as s , financements as f, startups as st WHERE s.id = ss.secteur_id and f.startup_id= st.id group by
// s.secteur");




        /*  $resultat=DB::select(" SELECT s.secteur as secteur, SUM(f.montant + st.montant_fonds) finance FROM startup_secteur as ss, secteurs as s , financements as f, startups as st WHERE s.id = ss.secteur_id and f.startup_id= st.id ")
                  ->groupBy('s.secteur')
                   ->pluck('secteur','finance')
                  ->all();*/
      /* $dataSF="";
        foreach ($resultat as $val )
        {
            $dataSF.="{'y:'".$val->secteur."',  x:  ".$val->finance."},";
        }

        $chartSF=$dataSF;*/
///*bar accompagnement / startup
$groups= DB::table('financements as f')
            ->join('startups as s', 's.id', '=', 'f.startup_id')
            ->select('f.nom as structure',DB::raw("count(f.startup_id) as startup" ))
            ->groupBy('structure')
            ->pluck('structure','startup')
            ->all();




        $chart = new Chart;
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));
        $chart->colours = '#8FCC19';

        return view ('statistiques.statistique',compact('dataS','chart','dataF','chartData','datas'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




}
