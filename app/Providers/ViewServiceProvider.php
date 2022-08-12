<?php

namespace App\Providers;

use App\Models\Feature;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $features = Feature::whereNotNull('description')->get();

        view()->share(
            compact(
                'features'
            )
        );
    }
}
