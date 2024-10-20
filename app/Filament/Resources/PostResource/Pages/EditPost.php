<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            ...parent::getFormActions(),
            Action::make('GenerateMeta')
                ->action(
                    function (Action $action, Post $post) {
                        if ($post->meta) {
                            $post->meta()->update([
                                'reading_time' => round(str($post->content)->wordCount() / 200),
                            ]);
                        } else {
                            $post->meta()->create([
                                'reading_time' => round(str($post->content)->wordCount() / 200),
                            ]);
                        }
                    }
                ),
        ];
    }
}
