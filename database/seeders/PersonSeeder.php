<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            [
            'name' => Str::random(5),
            'mail' => Str::random(5).'@gmail.com',
            'age' => 10,
            ],
            [
            'name' => Str::random(5),
            'mail' => Str::random(5).'@gmail.com',
            'age' => 20,
            ],
            [
            'name' => Str::random(5),
            'mail' => Str::random(5).'@gmail.com',
            'age' => 30,
            ],
            [
            'name' => Str::random(5),
            'mail' => Str::random(5).'@gmail.com',
            'age' => 40,
            ],
            [
            'name' => Str::random(5),
            'mail' => Str::random(5).'@gmail.com',
            'age' => 50,
            ],
            [
            'name' => Str::random(5),
            'mail' => Str::random(5).'@gmail.com',
            'age' => 60,
            ],
        ]);
    }
}
