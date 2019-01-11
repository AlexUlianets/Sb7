<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CdnSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cdn_settings')->insert(
        	array(
        		'id' => 1,
        		'cdn' => 'disable'
        	)
        );
    }
}
