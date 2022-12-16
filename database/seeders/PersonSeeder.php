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
            'name' => 'Taro',
            'mail' => Str::random(5).'@gmail.com',
            'age' => 10,
            ],
            [
            'name' => 'Hanako',
            'mail' => Str::random(5).'@gmail.com',
            'age' => 20,
            ],
            [
            'name' => 'Keisuke',
            'mail' => Str::random(5).'@gmail.com',
            'age' => 30,
            ],
            [
            'name' => 'Kota',
            'mail' => Str::random(5).'@gmail.com',
            'age' => 40,
            ],
            [
            'name' => 'Yuri',
            'mail' => Str::random(5).'@gmail.com',
            'age' => 50,
            ],
            [
            'name' => 'Mami',
            'mail' => Str::random(5).'@gmail.com',
            'age' => 60,
            ],
        ]);
    }
}
