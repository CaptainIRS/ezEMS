<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

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
