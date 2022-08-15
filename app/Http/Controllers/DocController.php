<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use Illuminate\Support\Facades\Storage;

class DocController extends Controller
{
    public function show(Doc $doc)
    {
        $disk = Storage::disk('content');

        $nav = collect(
                $disk->allDirectories('docs')
            )
            ->sort()
            ->mapWithKeys(function($path) use ($disk) {
                $directory = explode('-', basename($path), 2)[1] ?? 'No title';
                $directory = str_replace(['-'], [' '], $directory);

                return [ucwords($directory) => collect($disk->allFiles($path))
                    ->sort()
                    ->map(function($filepath) {
                        $filename = explode('-', basename($filepath), 2)[1] ?? 'No title';
                        $filename = str_replace(['-', '.md'], [' ', ''], $filename);

                        return ucwords($filename);
                })];
            });

        return view('docs.show', compact('nav', 'doc'));
    }
}
