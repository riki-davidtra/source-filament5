<?php

namespace App\Filament\Pages;

use App\Models\AppSeoSetting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;

class AppSeoSettingPage extends Page implements HasForms
{
    use HasPageShield;
    use InteractsWithForms;

    protected string $view = 'filament.pages.app-seo-setting-page';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::MagnifyingGlass;
    protected static ?int $navigationSort                   = 93;
    protected static string|UnitEnum|null $navigationGroup  = 'Settings';
    protected static ?string $navigationLabel               = 'SEO Settings';
    protected static ?string $title                         = 'SEO Settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->getRecord()?->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    Tabs::make('SeoSettings')
                        ->columns(2)
                        ->tabs([
                            Tab::make('Basic SEO')
                                ->schema([
                                    TextInput::make('meta_title')
                                        ->label('Meta Title')
                                        ->helperText('Judul yang tampil di hasil pencarian Google.')
                                        ->maxLength(160),

                                    Textarea::make('meta_description')
                                        ->label('Meta Description')
                                        ->helperText('Deskripsi singkat yang tampil di bawah judul pada hasil pencarian.')
                                        ->rows(3)
                                        ->maxLength(255)
                                        ->columnSpanFull(),

                                    TextInput::make('canonical_url')
                                        ->label('Canonical URL')
                                        ->helperText('URL utama untuk mencegah duplikasi konten di mata mesin pencari.')
                                        ->placeholder('https://contoh.com')
                                        ->url(),
                                ]),

                            Tab::make('Open Graph')
                                ->schema([
                                    TextInput::make('og_title')
                                        ->label('OG Title')
                                        ->helperText('Judul yang tampil saat link dibagikan ke media sosial.')
                                        ->maxLength(160),

                                    Textarea::make('og_description')
                                        ->label('OG Description')
                                        ->helperText('Deskripsi yang tampil saat link dibagikan ke media sosial.')
                                        ->rows(3)
                                        ->maxLength(255)
                                        ->columnSpanFull(),

                                    FileUpload::make('og_image')
                                        ->label('OG Image')
                                        ->helperText('Gambar preview saat dibagikan. Ukuran disarankan 1200x630px.')
                                        ->image()
                                        ->disk('public')
                                        ->directory('seo'),

                                    TextInput::make('og_type')
                                        ->label('OG Type')
                                        ->helperText('Tipe konten Open Graph, umumnya "website" atau "article".')
                                        ->default('website'),
                                ]),

                            Tab::make('Search Engine')
                                ->schema([
                                    Toggle::make('robots_index')
                                        ->label('Allow Indexing')
                                        ->helperText('Jika dimatikan, halaman tidak akan muncul di hasil pencarian.')
                                        ->default(false),

                                    Toggle::make('robots_follow')
                                        ->label('Allow Following Links')
                                        ->helperText('Jika dimatikan, mesin pencari tidak akan menyusuri tautan internal di halaman.')
                                        ->default(false),

                                    TextInput::make('sitemap_url')
                                        ->label('Sitemap URL')
                                        ->helperText('Lokasi file sitemap.xml, jika tersedia.')
                                        ->placeholder('https://contoh.com/sitemap.xml')
                                        ->url(),
                                ]),

                            Tab::make('Tracking')
                                ->schema([
                                    TextInput::make('google_analytics_id')
                                        ->label('Google Analytics ID')
                                        ->placeholder('G-XXXXXXX')
                                        ->maxLength(50),

                                    TextInput::make('google_tag_manager_id')
                                        ->label('Google Tag Manager ID')
                                        ->placeholder('GTM-XXXXXXX')
                                        ->maxLength(50),

                                    TextInput::make('google_search_console_id')
                                        ->label('Google Search Console ID')
                                        ->helperText('Kode verifikasi meta tag dari Google Search Console.')
                                        ->maxLength(100),

                                    TextInput::make('facebook_pixel_id')
                                        ->label('Facebook Pixel ID')
                                        ->maxLength(50),
                                ]),
                        ]),
                ])
                    ->livewireSubmitHandler('save')
                    ->footer([
                        Actions::make([
                            Action::make('save')
                                ->label('Save SEO Settings')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ]),
            ])
            ->record($this->getRecord())
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $record = $this->getRecord();

        if (! $record) {
            $record = new AppSeoSetting();
        }

        $record->fill($data);
        $record->save();

        Notification::make()
            ->title('SEO Settings saved successfully')
            ->success()
            ->send();
    }

    public function getRecord(): ?AppSeoSetting
    {
        return AppSeoSetting::query()->find(1);
    }
}
