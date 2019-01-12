<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_settings')->insert(
        	array(
        		'id' => 1,
        		'inquery_email' => '',
        		'order_email' => '',
        		'email_template' => '',
        	)
        );
    }
}
