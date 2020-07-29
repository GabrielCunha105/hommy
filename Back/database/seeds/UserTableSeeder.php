<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (App\User::class,12)->create()->each(function ($user) {
            $comments = factory (App\Comment::class, 2)->make();
            $user->comments()->saveMany($comments);
            $dormRooms = factory (App\DormRoom::class, 2)->make();
            $user->dormRooms()->saveMany($dormRooms);
        });;
    }
}