<?php

use Illuminate\Database\Seeder;

class SignerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Signer::class, 50)->create([
            'user_id' => 1]);
    }
}
