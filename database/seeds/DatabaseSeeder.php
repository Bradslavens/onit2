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
        $this->call(UserSeeder::class);
        $this->call(BaseFormSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(FormSeeder::class);
        $this->call(FieldSeeder::class);
    }
}
