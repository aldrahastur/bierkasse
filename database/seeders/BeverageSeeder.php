<?php

namespace Database\Seeders;

use App\Models\Beverage;
use Illuminate\Database\Seeder;

class BeverageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beverage = [
            'name' => 'Freiberger',
            'selling_price' => 1.5,
            'purchase_price' => 1.2, // password
        ];
        Beverage::insert($beverage);

        $beverage = [
            'name' => 'Agustiner',
            'selling_price' => 2,
            'purchase_price' => 1.5, // password
        ];
        Beverage::insert($beverage);

        $beverage = [
            'name' => 'Cola',
            'selling_price' => 1.2,
            'purchase_price' => 0.9, // password
        ];
        Beverage::insert($beverage);

        $beverage = [
            'name' => 'Wasser',
            'selling_price' => 1,
            'purchase_price' => 0.5, // password
        ];
        Beverage::insert($beverage);
    }
}
