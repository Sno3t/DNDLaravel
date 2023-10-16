<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password')
        ]);

//        DB::table('characters')->insert([
//            'name' => Str::random(10),
//            'race' => Str::random(10),
//            'age' => Str::ramdom(3),
//            'backstory' =>Str::random(100)
//        ]);
    }
}
