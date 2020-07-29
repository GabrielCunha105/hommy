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
        factory (App\DormRoom::class,12)->create()->each(function ($dormRoom) {
            $comments = factory (App\Comment::class, 2)->make();
            $dormRoom->comments()->saveMany($comments);
            $user = factory (App\User::class)->make();
            $user->save();
            $user->favoritas()->attach($dormRoom);
        });
    }
}
