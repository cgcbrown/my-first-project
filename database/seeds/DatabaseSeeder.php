<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(VenuesSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(DeedsSeeder::class);
        $this->call(EventsSeeder::class);
    }
}
