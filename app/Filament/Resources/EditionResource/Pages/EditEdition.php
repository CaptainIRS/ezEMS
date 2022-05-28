<?php

namespace App\Filament\Resources\EditionResource\Pages;

use App\Filament\Resources\EditionResource;
use Filament\Facades\Filament;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditEdition extends EditRecord
{
    protected static string $resource = EditionResource::class;

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
