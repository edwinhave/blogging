<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name'=> 'games', 'created_at'=> now(), 'updated_at'=> now()],
            ['name'=> 'web development', 'created_at'=> now(), 'updated_at'=> now()],
            ['name'=> 'how to', 'created_at'=> now(), 'updated_at'=> now()],
            ['name'=> 'updates', 'created_at'=> now(), 'updated_at'=> now()],
        ];

        DB::table('tags')->insert($tags);
    }
}
