<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PushNotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('push_notifications')->insert(
        	array(
        		'id' => 1,
        		'default_notification' => '',
        		'app_id' => '',
        		'sender_id' => ''
        	)
        );
    }
}
