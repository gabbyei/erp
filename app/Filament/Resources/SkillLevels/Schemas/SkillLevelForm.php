<?php

namespace App\Filament\Resources\SkillLevels\Schemas;

use App\Models\SkillType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SkillLevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('skill_type_id')
                ->label('Skill Type')
                ->options(
                    fn () => SkillType::query()
                        ->orderBy('name')
                        ->pluck('name', 'id')
                        ->toArray()
                )
                ->searchable()
                ->required(),

            TextInput::make('name')
                ->label('Nama Skill Level')
                ->required()
                ->maxLength(255),
        ]);
    }
}