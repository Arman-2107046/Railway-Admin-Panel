<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Client Details')
                            ->schema([
                                Forms\Components\TextInput::make('link')
                                    ->label('Client Link')
                                    ->url()
                                    ->required(),

                                Forms\Components\FileUpload::make('image')
                                    ->label('Client Image')
                                    ->image()
                                    ->imageEditor()
                                    ->directory('clients')
                                    ->required(),
                            ])
                            ->columns(1), // single column layout
                    ])
                    ->columns(1), // group columns
            ]);
    }

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\ImageColumn::make('image')
                ->label('Client Image')
                ->square(),
            Tables\Columns\TextColumn::make('link')
                ->label('Client Link')
                ->limit(50),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(), // Add single delete action
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(), // Add bulk delete
        ])
        ->defaultSort('id', 'desc');
}

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
