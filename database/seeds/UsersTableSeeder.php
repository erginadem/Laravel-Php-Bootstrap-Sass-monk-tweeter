<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $GLOBALS['userCount'] = intval($this->command->ask('How many users?'));

        factory(App\User::class, $GLOBALS['userCount'])->create()->each(function($user) {
            $user->profile()->saveMany(factory(App\Profile::class), 1)->create(['user_id' => $user->id]);
            $user->tweets()->saveMany(factory(App\Tweet::class, 25))->create(['user_id' =>  $user->id]);
            $user->comments()->saveMany(factory(App\Comment::class, 25))->create(['user_id' => $user->id]);
            $user->likes()->saveMany(factory(App\Like::class, 25))->create(['user_id'  =>  $user->id]);
        });
    }
}
