<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:rfc', // email:dns
        ]);

        Subscriber::updateOrCreate([
            'email' => $validated['email'],
        ]);

        return back()
            ->with('message', 'We will keep you updated!');
    }
}
