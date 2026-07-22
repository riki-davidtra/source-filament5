<?php

namespace App\Filament\Resources\AppSocials\Pages;

use App\Filament\Resources\AppSocials\AppSocialResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAppSocials extends ListRecords
{
    protected static string $resource = AppSocialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
