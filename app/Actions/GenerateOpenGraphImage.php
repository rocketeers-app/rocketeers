<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Browsershot\Browsershot;

class GenerateOpenGraphImage
{
    use AsAction;

    public function handle()
    {
        if(! app()->environment('local') && ! $request->hasValidSignature()) {
            abort(403);
        }

        $title = $request->title ?? config('app.name');
        $filename = str_slug($title).'.jpg';

        $html = view('social.open-graph-image', compact('title'));

        if(! Storage::disk('public')->exists('social/open-graph/'.$filename)) {
            $this->saveOpenGraphImage($html, $filename);
        }

        return $this->getOpenGraphImageResponse($filename);
    }

    public function saveOpenGraphImage($html, $filename)
    {
        $path = Storage::disk('public')
            ->path('social/open-graph/'.$filename);

        Browsershot::html($html)
            ->showBackground()
            ->windowSize(1200, 630)
            ->setScreenshotType('jpeg', 100)
            ->save($path);
    }

    public function getOpenGraphImageResponse($filename)
    {
        return response(
            Storage::disk('public')->get('social/open-graph/'.$filename), 200, [
            'Content-Type' => 'image/jpeg',
        ]);
    }
}
