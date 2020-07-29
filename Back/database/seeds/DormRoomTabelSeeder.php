<?php

use Illuminate\Database\Seeder;

class DormRoomTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (App\DormRoom::class,12)->create();
    }
}
