<?php

namespace App\Filament\Resources\CollegeResource\Pages;

use App\Filament\Resources\CollegeResource;
use Exception;
use Filament\Facades\Filament;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditCollege extends EditRecord
{
    protected static string $resource = CollegeResource::class;

    protected function getActions(): array
    {
        return [
            Action::make('delete')
                ->action(function () {
                    try {
                        $this->record->delete();
                    } catch (Exception) {
                        Filament::notify('danger', 'Could not delete record. Delete the child records first.');
                    }
                })
                ->color('danger')
                ->requiresConfirmation(),
        ];
    }
}
