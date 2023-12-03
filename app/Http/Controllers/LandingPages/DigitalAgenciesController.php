<?php

namespace App\Http\Controllers\LandingPages;

use App\Http\Controllers\Controller;

class DigitalAgenciesController extends Controller
{
    public function __invoke()
    {
        return view('landingpages.digital-agencies');
    }
}
