<?php

namespace App\Filament\Resources\Attendances\Schemas;

use App\Models\Employee;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Attendance Information')
                    ->description('Please provide the attendance information below.')
                    ->columns(2)
                    ->columnSpan(2)
                    ->schema([
                        Select::make('employee_id')
                            ->label('Employee')
                            ->options(
                                Employee::query()
                                    ->with('user')
                                    ->get()
                                    ->mapWithKeys(function (Employee $employee) {
                                        return [
                                            $employee->id => $employee->user->name,
                                        ];
                                    })
                                    ->toArray()
                            )
                            ->searchable()
                            ->preload()
                            ->required(),

                        DatePicker::make('date')
                            ->label('Date')
                            ->required(),

                        TimePicker::make('check_in')
                            ->label('Check In'),

                        TimePicker::make('check_out')
                            ->label('Check Out'),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'Present' => 'Present',
                                'Late' => 'Late',
                                'Sick' => 'Sick',
                                'Permission' => 'Permission',
                                'Absent' => 'Absent',
                            ])
                            ->required(),
                    ]),
            ]);
    }
}