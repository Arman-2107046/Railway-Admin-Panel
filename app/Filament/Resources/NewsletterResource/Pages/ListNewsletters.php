<?php

namespace App\Filament\Resources\NewsletterResource\Pages;

use App\Filament\Resources\NewsletterResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use App\Models\Newsletter;
use Filament\Notifications\Notification;

class ListNewsletters extends ListRecords
{
    protected static string $resource = NewsletterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('copy_emails')
                ->label('Copy All Emails')
                ->color('success')
                ->icon('heroicon-o-clipboard')
                ->action(function () {
                    $emails = Newsletter::pluck('email')->implode(', ');

                    // Copy to clipboard directly with JS
                    $this->js("navigator.clipboard.writeText(`{$emails}`)");

                    // Show success notification
                    Notification::make()
                        ->title('All emails copied to clipboard!')
                        ->success()
                        ->send();
                }),
        ];
    }
}
