<?php

namespace App\Filament\Resources;

use App\Filament\Forms\Actions\GenerateSlugAction;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Posts';

    protected static ?string $navigationIcon = 'ri-newspaper-line';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Contents')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->hintAction(GenerateSlugAction::make()),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->disabledOn('edit')
                            ->readOnlyOn('edit'),
                        Forms\Components\Textarea::make('description')
                            ->autosize()
                            ->maxLength(255),
                        Forms\Components\MarkdownEditor::make('content')
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Fieldset::make('Publication')
                    ->schema([
                        Forms\Components\DateTimePicker::make('date')
                            ->required(),
                        Forms\Components\Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'review' => 'Review',
                                'ready_for_preview' => 'Ready for Preview',
                                'published' => 'Published',
                            ])
                            ->default('draft'),
                    ]),
                Forms\Components\Fieldset::make('Cover')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image(),
                        Forms\Components\Textarea::make('image_alt')
                            ->required()
                            ->autosize()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('image_author')
                            ->maxLength(255),
                    ]),
                Forms\Components\Fieldset::make('Taxonomy')
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'title')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->hintAction(GenerateSlugAction::make()),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->required()
                            ->native(false)
                            ->preload(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                Tables\Grouping\Group::make('category.title')
                    ->titlePrefixedWithLabel(false)
                    ->getTitleFromRecordUsing(fn(Post $post) => $post->category?->title)
                    ->collapsible(),
                Tables\Grouping\Group::make('date')
                    ->date()
                    ->groupQueryUsing(fn(Builder $query) => $query
                        ->select(DB::raw('YEAR(date) as year, MONTH(date) as month'))
                        ->groupBy('year', 'month'))
                    ->titlePrefixedWithLabel(false)
                    ->getTitleFromRecordUsing(fn(Post $post) => $post->date->format('F Y'))
                    ->collapsible(),
            ])
            ->defaultSort('date', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date('d M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('category.title')
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
            RelationManagers\MetaRelationManager::class,
            RelationManagers\TagsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
