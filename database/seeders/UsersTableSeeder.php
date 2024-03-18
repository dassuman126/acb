<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "role_id" => "1",
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("pass@admin"),
        ]);
 
        DB::table("users")->insert([
            "role_id" => "2",
            "name" => "State",
            "email" => "state@gmail.com",
            "password" => bcrypt("pass@state"),
        ]);
 
        DB::table("users")->insert([
            "role_id" => "3",
            "name" => "Range",
            "email" => "range@gmail.com",
            "password" => bcrypt("pass@range"),
        ]);
        DB::table("users")->insert([
            "role_id" => "4",
            "name" => "Unit",
            "email" => "unit@gmail.com",
            "password" => bcrypt("pass@unit"),
        ]);
    }
}
