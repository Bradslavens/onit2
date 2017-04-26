<?php

use Illuminate\Database\Seeder;

class FieldForFormsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Field::class, 10)->create(['user_id'=>1]);
    }
}
