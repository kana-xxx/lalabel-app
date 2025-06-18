<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'id' => 5,
            'name' => '発見',
           ]);
    
           Status::create([
            'id' => 6,
            'name' => '進行中',
           ]);
    }
}
