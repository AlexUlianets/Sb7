<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images_settings')->insert(
        	array(
        		'id' => 1,
        		'api_key' => '',
        		'compress_bg' => 'disable',
        		'compress_upload' => 'disable',
        		'not_compress_auto' => 'disable',
        		'sizes_compress' => ''
        	)
        );
    }
}
