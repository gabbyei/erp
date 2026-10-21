<?php

namespace App\Filament\Resources\EmployeeSkills\Schemas;

use App\Models\Employee;
use App\Models\Skill;
use App\Models\SkillLevel;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Slider;
//use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class EmployeeSkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('employee_id')
                    ->relationship('employee', 'id', modifyQueryUsing: fn ($query) => $query->with('user'))
                    ->getOptionLabelFromRecordUsing(fn (Employee $record) => $record->user->name)
                    ->required(),
                Select::make('skill_type_id')
                    ->label('Kategori Skill')
                    ->relationship('skillType', 'name')
                    ->live()
                    ->required(),
                Select::make('skill_id')
                    ->label('Skill')
                    ->options(fn (Get $get) => Skill::query()->where('skill_type_id', $get('skill_type_id'))->pluck('name', 'id'))
                    ->disabled(fn (Get $get) => !$get('skill_type_id'))
                    ->required(),
                Select::make('skill_level_id')
                    ->label('Level Skill')
                    ->options(fn (Get $get) => SkillLevel::query()->where('skill_type_id', $get('skill_type_id'))->pluck('name', 'id'))
                    ->disabled(fn (Get $get) => !$get('skill_type_id'))
                    ->required(),
                Slider::make('level_progress')
                    ->label('Progress (%)')
                    ->minValue(0)
                    ->maxValue(100)
                    ->step(1)
                    ->required()
                    ->live()
                    ->hint(fn ($state) => ($state ?? 0) . '%')
                    ->default(0),
                Toggle::make('is_default_level')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->required(),
                DatePicker::make('effective_date')
                    ->required(),
                DatePicker::make('expiry_date'),
            ]);
    }
}
