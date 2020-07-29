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
        factory (App\User::class,12)->create();
        App\User::create([
            'name' => 'Kujo Jotaro',
            'email' => 'star@platinum.com',
            'phone' => '13123123123',
            'gender' => 'm',
            'dateOfBirth' => '01/02/2003',
            'phone' => '13123123123',
            'isTenant' => 0,
            'registrationDate' => '09/09/2009',
            'password' => 'abc12345',
            'cpf' => '52877807029',
        ]);
    }
}
