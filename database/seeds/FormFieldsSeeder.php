<?php

use Illuminate\Database\Seeder;

class FormFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Form::class, 10)->create(['user_id' => 1])
            ->each( function($field)
                {
                    $field->fields()->attach(factory(\App\Field::class, 5)->create(['user_id' => 1]))   ;
                });
    }
}
