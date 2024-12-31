<?php

namespace App\Filament\Resources\KabkotaResource\Pages;

use App\Filament\Resources\KabkotaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKabkota extends EditRecord
{
    protected static string $resource = KabkotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
