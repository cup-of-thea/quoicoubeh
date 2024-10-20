<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'ri-hand-heart-line';

    protected static ?string $navigationGroup = 'Actions';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order')
                    ->unique()
                    ->numeric()
                    ->prefixIcon('ri-hashtag')
                    ->required()
                    ->minValue(0),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->autosize()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('icon')
                    ->image()
                    ->avatar()
                    ->imageEditor()
                    ->circleCropper()
                    ->panelAspectRatio('1:1')
                    ->required()
                    ->maxSize(2048),
                Forms\Components\TextInput::make('icon_alt')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->url()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('published_at')
                    ->native(false)
                    ->seconds(false)
                    ->nullable()
                    ->suffixAction(
                        Forms\Components\Actions\Action::make('publish')
                            ->icon('ri-time-line')
                            ->label('Publish now')
                            ->action(function (Forms\Set $set, $state) {
                                $set('published_at', now());
                            })
                    )
                    ->hintAction(
                        Forms\Components\Actions\Action::make('unpublish')
                            ->icon('ri-close-line')
                            ->label('Unpublish')
                            ->action(function (Forms\Set $set, $state) {
                                $set('published_at', null);
                            })
                    )
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->columns([
                Tables\Columns\TextInputColumn::make('order')
                    ->type('number')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('icon')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('url')
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
