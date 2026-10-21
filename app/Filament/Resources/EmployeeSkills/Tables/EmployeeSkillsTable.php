<?php

namespace App\Filament\Resources\EmployeeSkills\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeeSkillsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employee.user.name')
                    ->label('Nama Pegawai')
                    ->sortable(),
                TextColumn::make('skillType.name')
                    ->label('Kategori Skill')
                    ->sortable(),
                TextColumn::make('skill.name')
                    ->label('Skill')
                    ->sortable(),
                TextColumn::make('skillLevel.name')
                    ->label('Level Skill')
                    ->sortable(),
                TextColumn::make('level_progress')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_default_level')
                    ->boolean(),
                ImageColumn::make('image'),
                TextColumn::make('effective_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('expiry_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
