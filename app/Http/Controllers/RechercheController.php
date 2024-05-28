<?php

namespace App\Http\Controllers;


use App\DataTables\StartupDataTable;
use App\Models\Startup;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RechercheController extends Controller
{
   public function index(StartupDataTable $dataTable)
    {
       /* if ($dataTable->ajax()) {
            $data = Startup::select('logo','nom_startup','description','phase','tags');
            dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Détails</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('recherche');*/
        $items = \App\Models\Startup::all();

        return view('recherche', compact('items'));
    }



}
