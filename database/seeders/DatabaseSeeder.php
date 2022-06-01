<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();
        Employee::truncate();
        $this->call(CompanySeeder::class);
        $this->call(EmployeeSeeder::class);

        User::truncate();
        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);



    }
}
