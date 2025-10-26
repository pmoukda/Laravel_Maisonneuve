<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SetLocaleController extends Controller
{
      public function index($locale){
         if (in_array($locale, ['en', 'fr'])) {
            Session::put('locale', $locale);
        }
        return back();
    }
}
