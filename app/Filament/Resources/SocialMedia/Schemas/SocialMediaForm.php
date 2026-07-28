<?php

namespace App\Filament\Resources\SocialMedia\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SocialMediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('platform')
                    ->label('Platform')
                    ->required()
                    ->options([
                        'whatsapp'  => 'WhatsApp',
                        'instagram' => 'Instagram',
                        'facebook'  => 'Facebook',
                        'youtube'   => 'YouTube',
                        'tiktok'    => 'TikTok',
                        'twitter'   => 'Twitter / X',
                        'linkedin'  => 'LinkedIn',
                        'telegram'  => 'Telegram',
                    ])
                    ->searchable()
                    ->preload()
                    ->unique(ignoreRecord: true),

                TextInput::make('url')
                    ->label('URL')
                    ->required()
                    ->url()
                    ->maxLength(255)
                    ->prefixIcon('heroicon-o-link'),

                Toggle::make('is_active')
                    ->label('Is Active')
                    ->default(true),
            ]);
    }
}
