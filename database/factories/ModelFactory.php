<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt(env('TESTPW')),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Transaction::class, function (Faker\Generator $faker) {
    
    return [
        'address1' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip' => $faker->postcode,
        'status' => 1,
    ];
});


$factory->define(App\Menu::class, function (Faker\Generator $faker) {
    
    return [
        'name' => $faker->name,
    ];
});


$factory->define(App\Form::class, function (Faker\Generator $faker) {
    
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Item::class, function (Faker\Generator $faker)
{
    return [
    'name' => $faker->name,
    ];
});

$factory->define(App\Field::class, function (Faker\Generator $faker)
{
    return [
    'name' => $faker->word,
    'label' => $faker->word,
    'description' => $faker->sentence,
    'type' => 'text',
    ];
});

$factory->define(App\Signer::class, function (Faker\Generator $faker)
{
    return [
    'name' => $faker->name,
    ];
});



$factory->define(App\TransactionFormField::class, function (Faker\Generator $faker)
{
    return [
    'form_id' => rand(0,100),
    'value' => $faker->word,
    'executed_date' => $faker->date,
    ];
});


$factory->define(App\Contact::class, function (Faker\Generator $faker)
{
    return [
    'name' => $faker->name,
    'email' => $faker->email,
    'role_a' => $faker->word,
    ];
});






