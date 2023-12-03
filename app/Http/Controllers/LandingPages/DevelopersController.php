<?php

namespace App\Http\Controllers\LandingPages;

use App\Http\Controllers\Controller;

class DevelopersController extends Controller
{
    public function __invoke()
    {
        return view('landingpages.developers');
    }
}
