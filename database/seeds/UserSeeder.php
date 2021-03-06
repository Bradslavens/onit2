<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create(['id' => 1, 'password' => bcrypt(env('TESTPW')), 'email' => 'b@example.c', 'role' => 'admin', 'teamLeader' => 1]);
    }
}
