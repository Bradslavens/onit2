<?php

use Illuminate\Database\Seeder;

class I_listSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('i_lists')->insert(
            [
                'name' => 'transactionSide',
                'id' => 1,
                'user_id' => 1,
            ]);

        DB::Table('items')->insert(
            [
                'name' => 'buyer',
                'id' => 1,
                'user_id' => 1
            ]);

        DB::Table('i_list_items')->insert(
            [
                'i_list_id' => 1,
                'item_id' => 1,
            ]);
    }
}
