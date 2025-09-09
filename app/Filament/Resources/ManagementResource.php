<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManagementResource\Pages;
use App\Models\Management;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ManagementResource extends Resource
{
    protected static ?string $model = Management::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Management Details')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Name')
                                    ->required(),

                                Forms\Components\TextInput::make('designation')
                                    ->label('Designation')
                                    ->required(),

                                Forms\Components\TextInput::make('location')
                                    ->label('Location')
                                    ->required(),

                                Forms\Components\TextInput::make('linkedin')
                                    ->label('LinkedIn URL')
                                    ->url(),

                                Forms\Components\FileUpload::make('image')
                                    ->label('Profile Image')
                                    ->image()
                                    ->imageEditor()
                                    ->directory('management')
                                    ->required(),
                            ])
                            ->columns(1),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->square(),

                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('designation')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('location')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('linkedin')
                    ->limit(50),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListManagement::route('/'),
            'create' => Pages\CreateManagement::route('/create'),
            'edit' => Pages\EditManagement::route('/{record}/edit'),
        ];
    }
}
