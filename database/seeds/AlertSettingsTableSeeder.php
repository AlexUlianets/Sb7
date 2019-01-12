<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlertSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alert_settings')->insert(
        	array(
        		'id' => 1,
        		'create_welcome_email' => '',
        		'create_welcome_notification' => '',
        		'order_email' => '',
        		'order_notification' => '',
        		'order_status_email' => '',
        		'order_status_notification' => '',
        		'new_list_email' => '',
        		'new_list_notification' => '',
        		'forgot_password_email' => '',
        		'forgot_password_notification' => '',
        		'add_new_list_email' => '',
        		'add_new_list_notification' => ''
        	)
        );
    }
}
