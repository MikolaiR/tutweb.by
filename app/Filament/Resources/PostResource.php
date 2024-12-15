<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('Main')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('General')
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->translateLabel()
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                    if ($operation === 'create') {
                                        $set('slug', Str::slug($state));
                                    }
                                }),
                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->unique(ignoreRecord: true),
                            Forms\Components\RichEditor::make('excerpt')
                                ->translateLabel()
                                ->required()
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('content')
                                ->translateLabel()
                                ->required()
                                ->columnSpanFull(),
                        ]),
                    Forms\Components\Tabs\Tab::make('Categories & Tags')
                        ->schema([
                            Forms\Components\Select::make('category_id')
                                ->relationship('category', 'name')
                                ->required()
                                ->createOptionForm([
                                    Forms\Components\TextInput::make('name')
                                        ->required()
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                                    Forms\Components\TextInput::make('slug')
                                        ->required()
                                        ->unique('categories', 'slug'),
                                ]),
                            Forms\Components\Select::make('tags')
                                ->relationship('tags', 'name')
                                ->multiple()
                                ->preload()
                                ->createOptionForm([
                                    Forms\Components\TextInput::make('name')
                                        ->required()
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                                    Forms\Components\TextInput::make('slug')
                                        ->required()
                                        ->unique('tags', 'slug'),
                                ]),
                        ]),
                    Forms\Components\Tabs\Tab::make('SEO')
                        ->schema([
                            Forms\Components\TextInput::make('meta_title')
                                ->translateLabel()
                                ->required(),
                            Forms\Components\Textarea::make('meta_description')
                                ->translateLabel()
                                ->required()
                                ->rows(3),
                        ]),
                    Forms\Components\Tabs\Tab::make('Media')
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('image')
                                ->collection('image')
                                ->image()
                                ->imageEditor(),
                        ]),
                ])->columnSpanFull(),
            Forms\Components\Toggle::make('is_active')
                ->default(true),
            Forms\Components\DateTimePicker::make('published_at')
                ->default(now()),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')
                    ->collection('image'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('published_at', 'desc');
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
