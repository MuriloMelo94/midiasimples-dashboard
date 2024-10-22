<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NotebookResource\Pages;
use App\Filament\Resources\NotebookResource\RelationManagers;
use App\Models\Notebook;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NotebookResource extends Resource
{
    protected static ?string $model = Notebook::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    protected static ?string $navigationGroup = 'Gerenciamento';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('brand')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('serial_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('processor')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('memory')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('disk')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('serial_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('processor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('memory')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('disk')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
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
            'index' => Pages\ListNotebooks::route('/'),
            'create' => Pages\CreateNotebook::route('/create'),
            'edit' => Pages\EditNotebook::route('/{record}/edit'),
        ];
    }
}
