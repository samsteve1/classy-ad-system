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
        //$users = factory(App\User::class, 50)->make();

        factory(App\User::class, 100)->create();

    //     factory(App\User::class, 50)->create()->each(function ($user) {
    //         $user->posts()->save(factory(App\Post::class)->make());
    //     });
    }
}
