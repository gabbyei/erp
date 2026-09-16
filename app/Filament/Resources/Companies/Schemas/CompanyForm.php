<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Company Information')
                    ->icon(Heroicon::BuildingOffice2)
                    // ->iconColor((Color::blue()))
                    ->description('Please provide the company information below.')
                    ->columns(2)
                    ->columnSpan(2)
                    ->schema([
                        TextInput::make('name')
                            ->columnSpanFull()
                            ->required(),
                            
                            //---- BIAR BISA DI TARIK-TARIK KE BAWAH
                        // TextArea::make('address')
                        //     ->rows(3)
                        //     ->extraAttributes(['class' => 'resize: none'])
                        //     ->columnSpanFull()
                        //     ->required(),

                        TextArea::make('address')
                            ->rows(3)
                            ->extraInputAttributes([
                                'style' => 'resize: none !important;',])
                            ->columnSpanFull()
                            ->required(),
                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required(),
                        TextInput::make('phone_number')
                            ->tel()
                            ->required(),
                    ]), //WAJIB PAKE KOMA

                Section::make('Company Logo')
                    ->schema([
                        FileUpload::make('logo')
                             ->image()
                             ->disk('public')
                             ->directory('logos')
                             ->visibility('public'),
                    ])


            //----- FORM BIASA NO SECTION
                // TextInput::make('name')
                //     ->required(),
                // TextInput::make('address')
                //     ->required(),
                // TextInput::make('email')
                //     ->label('Email address')
                //     ->email()
                //     ->required(),
                // TextInput::make('phone_number')
                //     ->tel()
                //     ->required(),
                // FileUpload::make('logo')
                //     ->image()
                //     ->disk('public')
                //     ->directory('logos')
                //     ->visibility('public'),
            ])->columns(3);
    }
}
