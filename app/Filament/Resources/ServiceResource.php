<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?int $navigationSort = 1;

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
                            Forms\Components\RichEditor::make('description')
                                ->translateLabel()
                                ->required()
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('content')
                                ->translateLabel()
                                ->required()
                                ->columnSpanFull(),
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
                            SpatieMediaLibraryFileUpload::make('thumbnail')
                                ->collection('thumbnail')
                                ->image()
                                ->imageEditor(),
                            SpatieMediaLibraryFileUpload::make('gallery')
                                ->collection('gallery')
                                ->multiple()
                                ->reorderable()
                                ->image()
                                ->imageEditor(),
                        ]),
                ])->columnSpanFull(),
            Forms\Components\Toggle::make('is_active')
                ->default(true),
            Forms\Components\TextInput::make('sort_order')
                ->numeric()
                ->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('thumbnail'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
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
            ->defaultSort('sort_order');
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
