<?php

namespace App\Filament\Resources\VenueResource\Pages;

use App\Filament\Resources\VenueResource;
use Filament\Facades\Filament;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditVenue extends EditRecord
{
    protected static string $resource = VenueResource::class;

    protected function getActions(): array
    {
        return [
            Action::make('delete')
                ->action(function () {
                    try {
                        $this->record->delete();
                    } catch (\Exception $e) {
                        Filament::notify('danger', 'Could not delete record. Delete the child records first.');
                    }
                })
                ->color('danger')
                ->requiresConfirmation()
        ];
    }
}
