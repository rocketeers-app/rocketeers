<?php

namespace App\Http\Controllers;

class PricingController extends Controller
{
    public function __invoke()
    {
        return view('pages.pricing');
    }
}
