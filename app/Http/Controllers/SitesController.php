<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitesController extends Controller
{
    public function root()
    {
    	return view('sites.root');
    }
}
