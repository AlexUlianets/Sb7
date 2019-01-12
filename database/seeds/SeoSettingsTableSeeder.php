<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seo_settings')->insert(
        	array(
        		'id' => 1,
        		'show_name_after' => 'disable',
        		'enable_breadcumbs' => 'disable',
        		'between_breadcumbs' => '',
        		'anchor_for_homepage' => 'main',
        		'prefix_list_category' => '',
        		'prefix_search_page' => '',
        		'breadcumb_for_404' => '',
        		'bold_last_page' => 'disable',
        		'google_webmaster_tools' => '',
        		'bing_webmaster_tools' => '',
        		'pinterest_webmaster_tools' => '',
        		'seo_title' => '',
        		'seo_description' => '',
        		'seo_keywords' => '',
        		'list_title_as_meta_title' => 'disable',
        		'list_description_as_meta_description' => 'disable'
        	)
        );
    }
}
