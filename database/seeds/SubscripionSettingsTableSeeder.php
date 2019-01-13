<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscripionSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscription_settings')->insert(
        	array(
        		'id' => 1,
        		'enable_subscription' => 'disable',
        		'service_provide' => '',
        		'default_checkbox' => 'unchecked',
        		'checkbox_label' => 'Checkbox label',
        		'confirmation_label' => 'Confirmation label',
        		'api_key' => '',
        		'api_url' => ''
        	)
        );
    }
}
