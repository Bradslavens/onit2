<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('menus')->insert(
            [
                'name' => 'transactionSide',
                'id' => 1,
                'user_id' => 1,
            ]);

        DB::Table('items')->insert([
            [
                'name' => 'Buyer',
                'id' => 1,
                'user_id' => 1,
            ],
            [
                'name' => 'Seller',
                'id' => 2,
                'user_id' => 1,
            ],
            ]);

        DB::Table('item_menu')->insert([
            [
                'menu_id' => 1,
                'item_id' => 1,
                'user_id' => 1,
            ],
            [
                'menu_id' => 1,
                'item_id' => 2,
                'user_id' => 1,
            ],
            ]);
    }
}
