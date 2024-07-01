<?php

namespace App\Http\Controllers;

use App\Models\Rubrique;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index(){
        $rubriques = Rubrique::all();
        return view('formations.index', compact('rubriques'));
    }
}
