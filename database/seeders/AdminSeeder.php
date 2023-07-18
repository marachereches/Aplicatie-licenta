<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->delete();
        $adminRecords = [
            [
                'id' => 1, 'name' => 'Admin1', 'email' => 'admin@admin.com', 'password' => '$2y$10$Bbwd7QVX7Zv1yHf/8LMQEOy8BR/fCAMGTBefmHRDOUbGUnrznFQ/G'
            ]
        ];

        DB::table('admins')->insert($adminRecords);
    }
}
