<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoogleAnalyticsSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('google_analytics_settings')->insert(
        	array(
        		'id' => 1,
        		'tracking_code' => '',
        		'view_id' => ''
        	)
        );
    }
}
