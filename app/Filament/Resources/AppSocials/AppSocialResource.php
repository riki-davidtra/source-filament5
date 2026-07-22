<?php

namespace App\Filament\Resources\AppSocials;

use App\Filament\Resources\AppSocials\Pages\CreateAppSocial;
use App\Filament\Resources\AppSocials\Pages\EditAppSocial;
use App\Filament\Resources\AppSocials\Pages\ListAppSocials;
use App\Filament\Resources\AppSocials\Schemas\AppSocialForm;
use App\Filament\Resources\AppSocials\Tables\AppSocialsTable;
use App\Models\AppSocial;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AppSocialResource extends Resource
{
    protected static ?string $model = AppSocial::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Share;
    protected static ?int $navigationSort                      = 22;
    protected static string | UnitEnum | null $navigationGroup = 'Settings';
    protected static ?string $navigationLabel                  = 'Socials';
    protected static ?string $pluralModelLabel                 = 'Socials';
    protected static ?string $modelLabel                       = 'Social';

    protected static ?string $recordTitleAttribute = 'platform';

    public static function form(Schema $schema): Schema
    {
        return AppSocialForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AppSocialsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAppSocials::route('/'),
            // 'create' => CreateAppSocial::route('/create'),
            // 'edit' => EditAppSocial::route('/{record}/edit'),
        ];
    }
}
