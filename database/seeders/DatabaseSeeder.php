<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoomSeeder;
use Database\Seeders\RoomDescribeSeeder;
use Database\Seeders\RoomImageSeeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoomSeeder::class,
            RoomImageSeeder::class,
            UserSeeder::class,
        ]);
    }
}
