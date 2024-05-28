<?php

namespace App\Http\Controllers;

use App\Exports\StartupsExport;
use App\Imports\StartupsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function importExport()
    {
        return view('startup.import');
    }

    public function importFile(Request $request)
    {
        Excel::import(new StartupsImport, $request->file('file')->store('temp'));
        return back();
    }

    public function exportFile()
    {
        return Excel::download(new StartupsExport, 'startups-list.xlsx');
    }
}
