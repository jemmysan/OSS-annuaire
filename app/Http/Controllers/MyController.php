<?php

namespace App\Http\Controllers;

use App\Exports\StartupsExport;
use App\Imports\StartupsImport;
use Illuminate\Http\Request;
use App\Exports\AccompagnementsExport;
use App\Imports\AccompagnementsImport;
use Maatwebsite\Excel\Facades\Excel;

class MyController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Support\Collection
     */
    public function importExportView()
    {
        return view('import');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
       // return Excel::download(new AccompagnementsExport, 'accompagnements.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        //Excel::import(new AccompagnementsImport,request()->file('file'));
        Excel::import(new StartupsImport,request()->file('file'));

        return back();
    }

    public function fileImportExport()
    {
        return view('file-import');
    }

    public function fileImport(Request $request)
    {
        \Maatwebsite\Excel\Excel::import(new StartupsImport, $request->file('file')->store('temp'));
        return back();
    }
    public function fileExport()
    {
        return Excel::download(new StartupsExport, 'startup.xlsx');
    }
}
