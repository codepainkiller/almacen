<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'name' => 'percentage_gain',
            'description' => 'Porcentaje de ganancia para calcular el precio de venta de un producto',
            'value' => 15
        ]);
    }
}
