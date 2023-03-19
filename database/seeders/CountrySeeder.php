<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['name' => 'United States', 'code' => 'US'],
            ['name' => 'Canada', 'code' => 'CA'],
            ['name' => 'Lithuania', 'code' => 'LT'],
            ['name' => 'Latvia', 'code' => 'LV'],
            ['name' => 'Estonia', 'code' => 'ES'],
            // add more countries here...
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
