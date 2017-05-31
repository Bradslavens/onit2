<?php

use Illuminate\Database\Seeder;

class BaseFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('forms')->insert(
            [
                [
                    'name' => 'RPA - Residential Purchase Agreement',
                    'user_id' => 0,
                    'priority' => 10,
                ],
                [
                    'name' => 'RPA ADM - Addendum to the Residential Purchase Agreement',
                    'user_id' => 0,
                    'priority' => 10,
                ],
                [
                    'name' => 'MHPA - Manufactured Home Purchase Agreement',
                    'user_id' => 0,
                    'priority' => 20,
                ],
                [
                    'name' => 'MHPA ADM - Addendum to the Manufactured Home Purchase Agreement',
                    'user_id' => 0,
                    'priority' => 30,
                ],
                [
                    'name' => 'NCPA - New Construction Purchase Agreement',
                    'user_id' => 0,
                    'priority' => 40,
                ],
                [
                    'name' => 'NCPA ADM - Addendum to the New Construction Purchase Agreement',
                    'user_id' => 0,
                    'priority' => 50,
                ],
                [
                    'name' => 'RIPA - Residential Income Purchase Agreement',
                    'user_id' => 0,
                    'priority' => 60,
                ],
                [
                    'name' => 'RIPA ADM - Addendum to the Residential Income Purchase Agreement',
                    'user_id' => 0,
                    'priority' => 70,
                ],
                [
                    'name' => 'NODPA - Notice of Default Purchase Agreement',
                    'user_id' => 0,
                    'priority' => 80,
                ],
                [
                    'name' => 'NODPA ADM - Addendum to the Notice of Default Purchase Agreement',
                    'user_id' => 0,
                    'priority' => 90,
                ],
                [
                    'name' => 'SCO 1 - Seller Counter Offer 1',
                    'user_id' => 0,
                    'priority' => 100,
                ],
                [
                    'name' => 'SCO 2 - Seller Counter Offer 2',
                    'user_id' => 0,
                    'priority' => 110,
                ],
                [
                    'name' => 'SCO 3 - Seller Counter Offer 3',
                    'user_id' => 0,
                    'priority' => 120,
                ],
                [
                    'name' => 'SCO 4 - Seller Counter Offer 4',
                    'user_id' => 0,
                    'priority' => 130,
                ],
                [
                    'name' => 'SCO 5 - Seller Counter Offer 5',
                    'user_id' => 0,
                    'priority' => 140,
                ],
                [
                    'name' => 'BCO 1 - Buyer Counter Offer 1',
                    'user_id' => 0,
                    'priority' => 105,
                ],
                [
                    'name' => 'BCO 1 - Buyer Counter Offer 1',
                    'user_id' => 0,
                    'priority' => 115,
                ],
                [
                    'name' => 'BCO 1 - Buyer Counter Offer 1',
                    'user_id' => 0,
                    'priority' => 125,
                ],
                [
                    'name' => 'BCO 1 - Buyer Counter Offer 1',
                    'user_id' => 0,
                    'priority' => 135,
                ],
                [
                    'name' => 'BCO 1 - Buyer Counter Offer 1',
                    'user_id' => 0,
                    'priority' => 145,
                ],
                [
                    'name' => 'ADM 1',
                    'user_id' => 0,
                    'priority' => 150,
                ],
                [
                    'name' => 'ADM 2',
                    'user_id' => 0,
                    'priority' => 160
                ],
                [
                    'name' => 'ADM 3',
                    'user_id' => 0,
                    'priority' => 170
                ],
                [
                    'name' => 'ADM 4',
                    'user_id' => 0,
                    'priority' => 180
                ],
                [
                    'name' => 'ADM 5',
                    'user_id' => 0,
                    'priority' => 190
                ],
                [
                    'name' => 'ADM 6',
                    'user_id' => 0,
                    'priority' => 200,
                ],
                [
                    'name' => 'ADM 7',
                    'user_id' => 0,
                    'priority' => 210
                ],
                [
                    'name' => 'ADM 8',
                    'user_id' => 0,
                    'priority' => 220
                ],
                [
                    'name' => 'ADM 9',
                    'user_id' => 0,
                    'priority' => 230
                ],
                [
                    'name' => 'ADM 10',
                    'user_id' => 0,
                    'priority' => 240
                ],
            ]);
    }
}
