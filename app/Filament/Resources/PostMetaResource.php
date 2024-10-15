<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostMetaResource\Pages;
use App\Models\PostMeta;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PostMetaResource extends Resource
{
    protected static ?string $model = PostMeta::class;

    protected static ?string $navigationIcon = 'ri-donut-chart-line';

    protected static ?string $navigationGroup = 'Posts';

    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('post.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reading_time')
                    ->numeric()
                    ->sortable()
                    ->suffix(' min'),
                Tables\Columns\TextColumn::make('likes_count')
                    ->numeric(),
                Tables\Columns\TextColumn::make('reading_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('review_authors')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPostMetas::route('/'),
        ];
    }
}
