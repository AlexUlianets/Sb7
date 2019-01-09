<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_settings')->insert(
            array(
                'id' => '1',
                'paypal_payment' => 'false',
                'paypal_sandbox' => 'false',
                'email' => ''
            )
        );
    }
}
