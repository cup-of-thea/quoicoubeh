<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostMetaResource\Pages;
use App\Filament\Resources\PostMetaResource\RelationManagers;
use App\Models\PostMeta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostMetaResource extends Resource
{
    protected static ?string $model = PostMeta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('post_id')
                    ->relationship('post', 'title')
                    ->required(),
                Forms\Components\TextInput::make('reading_time')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('reading_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('review_authors')
                    ->maxLength(255),
                Forms\Components\TextInput::make('rows')
                    ->required()
                    ->numeric()
                    ->default(2),
                Forms\Components\TextInput::make('cols')
                    ->required()
                    ->numeric()
                    ->default(2),
            ]);
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
                    ->sortable(),
                Tables\Columns\TextColumn::make('reading_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('review_authors')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rows')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cols')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
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
            'create' => Pages\CreatePostMeta::route('/create'),
            'edit' => Pages\EditPostMeta::route('/{record}/edit'),
        ];
    }
}
