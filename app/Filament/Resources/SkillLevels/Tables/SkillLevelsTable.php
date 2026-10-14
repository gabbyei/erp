<?php

namespace App\Filament\Resources\SkillLevels\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SkillLevelsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('skillType.name')
                    ->label('Skill Type')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    // ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
