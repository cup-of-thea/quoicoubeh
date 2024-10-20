<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StreamResource\Pages;
use App\Filament\Resources\StreamResource\RelationManagers;
use App\Models\Stream;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StreamResource extends Resource
{
    protected static ?string $model = Stream::class;

    protected static ?string $navigationIcon = 'ri-twitch-line';


    protected static ?string $navigationGroup = 'Actions';

    protected static ?int $navigationSort = 42;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->avatar()
                    ->imageEditor()
                    ->circleCropper()
                    ->panelAspectRatio('1:1')
                    ->required()
                    ->maxSize(2048),
                Forms\Components\TextInput::make('image_alt')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('image_author')
                    ->maxLength(255),
                Forms\Components\TextInput::make('image_author_link')
                    ->url()
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
                    ),
                Forms\Components\DateTimePicker::make('start')
                    ->native(false)
                    ->seconds(false)
                    ->minutesStep(5)
                    ->required(),
                Forms\Components\DateTimePicker::make('end')
                    ->native(false)
                    ->seconds(false)
                    ->minutesStep(5)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                Tables\Columns\TextColumn::make('start')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end')
                    ->dateTime()
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
            'index' => Pages\ListStreams::route('/'),
            'create' => Pages\CreateStream::route('/create'),
            'edit' => Pages\EditStream::route('/{record}/edit'),
        ];
    }
}
