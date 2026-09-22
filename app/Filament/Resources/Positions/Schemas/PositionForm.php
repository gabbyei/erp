<?php

namespace App\Filament\Resources\Positions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class PositionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Position Information')
                    ->icon(Heroicon::BuildingOffice2)
                    // ->iconColor((Color::blue()))
                    ->description('Please provide the position information below.')
                    ->columns(2)
                    ->columnSpan(2)
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('description'),
                        TextInput::make('allowance')
                            ->numeric()
                            // ->step(0.01),
                    ])
                // TextInput::make('name')
                //     ->required(),
                // TextInput::make('description'),
                // TextInput::make('address'),
                // TextInput::make('email')
                //     ->label('Email address')
                //     ->email(),
                // TextInput::make('phone_number')
                //     ->tel(),
            ]);
    }
}