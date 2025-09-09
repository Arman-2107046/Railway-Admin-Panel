<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Contacts';
    // protected static ?string $navigationGroup = 'Submitted Emails';

    public static function form(Form $form): Form
    {
        return $form->schema([]); // empty form, since we only view submissions
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_name')->label('Name')->sortable(),
                Tables\Columns\TextColumn::make('user_email')->label('Email')->sortable()
                    ->searchable(), // <-- makes this column searchable

                Tables\Columns\TextColumn::make('subject')->label('Subject')->sortable(),
                Tables\Columns\TextColumn::make('message')->label('Message')
                    ->label('Message')
                    ->limit(50) // short preview
                    // ->wrap()
                    ->extraAttributes([
                        'class' => 'break-words',
                    ]),
                // ->tooltip(fn($record) => $record->message), // hover to see full message


                Tables\Columns\TextColumn::make('created_at')->label('Submitted At')->dateTime()->sortable(),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('view')
                    ->label('View')
                    ->icon('heroicon-o-eye')
                    ->modalHeading(fn($record) => 'Message from: ' . $record->user_name)
                    ->modalContent(fn($record) => view('filament.contact-modal', ['record' => $record]))
    ->action(fn($record) => null) // no action needed
//  ->view('filament.contact-modal')
                    ->color('primary')


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
            'index' => Pages\ListContacts::route('/'),
        ];
    }
}
