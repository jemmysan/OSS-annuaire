<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
