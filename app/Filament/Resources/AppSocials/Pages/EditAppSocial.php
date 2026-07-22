<?php

namespace App\Filament\Resources\AppSocials\Pages;

use App\Filament\Resources\AppSocials\AppSocialResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAppSocial extends EditRecord
{
    protected static string $resource = AppSocialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
