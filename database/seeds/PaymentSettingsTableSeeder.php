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
                'id' => 1,
                'email' => '',
                'live_client_id' => '',
                'live_client_secret' => '',
                'live_access_token' => '',
                'live_access_token_expiry' => '',
                'sandbox_mode' => 'disable',
                'sandbox_client_id' => '',
                'sandbox_client_secret' => '',
                'sandbox_access_token' => '',
                'sandbox_access_token_expiry' => ''
            )
        );
    }
}
