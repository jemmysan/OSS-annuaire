<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    public function index()
    {
        return view('autocomplete-search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $res = User::select("name")
            ->where("name","LIKE","%{$request->term}%")
            ->get();

        return response()->json($res);
    }
}
