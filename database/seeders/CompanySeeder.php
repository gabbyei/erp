<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'PT Kucing',
            'address' => 'Jl. Kucing No. 123, Jakarta',
            'email' => 'kucing@msc',
            'phone_number' => '088271241940'
        ]);
    }
}
