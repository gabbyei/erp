<?php

namespace App\Filament\Resources\Employees\Schemas;

use App\Models\Department;
use App\Models\Position;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Employee Information')
                    ->description('Please provide the employee information below.')
                    ->columns(2)
                    ->columnSpan(2)
                    ->schema([

                        TextInput::make('name')
                            ->label('Employee Name')
                            ->required()
                            ->maxLength(255),

                        Select::make('department_id')
                            ->label('Department')
                            ->options(Department::pluck('name', 'id'))
                            ->searchable()
                            ->required(),

                        Select::make('position_id')
                            ->label('Position')
                            ->options(Position::pluck('name', 'id'))
                            ->searchable()
                            ->required(),

                        TextInput::make('phone_number')
                            ->label('Phone Number')
                            ->tel(),

                        Textarea::make('address')
                            ->label('Address')
                            ->rows(3)
                            ->extraInputAttributes([
                                'style' => 'resize: none !important;',
                            ])
                            ->columnSpanFull(),

                        TextInput::make('place_of_birth')
                            ->label('Place of Birth'),

                        DatePicker::make('date_of_birth')
                            ->label('Date of Birth'),

                        Select::make('gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                                'other' => 'Other',
                            ]),

                        Select::make('religion')
                            ->options([
                                'islam' => 'Islam',
                                'christianity' => 'Christianity',
                                'catholic' => 'Catholic',
                                'hindu' => 'Hindu',
                                'buddhist' => 'Buddhist',
                                'konghucu' => 'Konghucu',
                            ]),

                        TextInput::make('salary')
                            ->numeric()
                            ->prefix('Rp'),

                        DatePicker::make('start_date')
                            ->label('Start Date'),

                        DatePicker::make('end_date')
                            ->label('End Date'),

                        Select::make('status')
                            ->options([
                                'applicant' => 'Applicant',
                                'active' => 'Active',
                                'trainee' => 'Trainee',
                            ])
                            ->default('active')
                            ->required(),
                    ]),

                Section::make('Employee Image')
                    ->description('Upload employee photo.')
                    ->columnSpan(1)
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('employees')
                            ->visibility('public'),
                    ]),
            ])
            ->columns(3);
    }
}