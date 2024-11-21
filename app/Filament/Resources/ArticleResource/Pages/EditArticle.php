<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use App\Models\Article;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArticle extends EditRecord
{
    protected static string $resource = ArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make()
                ->name('preview')
                ->label('Preview')
                ->color('gray')
                ->openUrlInNewTab()
                ->url(fn (Article $record) => route('knowledge', ['slug' => $record->slug])),
            Actions\DeleteAction::make(),
        ];
    }
}
