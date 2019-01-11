<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialLoginSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_login_settings')->insert(
        	array(
        		'id' => 1,
        		'all_settings' => 'disable',
        		'facebook' => 'disable',
        		'facebook_id' => '',
        		'facebook_secret' => '',
        		'google' => 'disable',
        		'google_id' => '',
        		'google_secret' => '',
        		'twitter' => 'disable',
        		'twitter_id' => '',
        		'twitter_secret' => ''
        	)
        );
    }
}
