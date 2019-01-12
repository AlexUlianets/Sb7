<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtherSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('other_settings')->insert(
        	array(
        		'id' => 1,
        		'gzip_compression' => 'disable',
        		'enable_captcha' => 'disable',
        		'captcha_site_key' => '',
        		'captcha_secret' => '',
        		'captcha_on_signup' => 'disable',
        		'captcha_on_list' => 'disable',
        		'captcha_on_login' => 'disable',
        		'captcha_on_forget' => 'disable',
        		'before_head_css' => '',
        		'end_body_tag_css' => '',
        		'cookie_message' => 'Default Cookie Message',
        		'cookie_bar_position' => 'top',
        		'cookie_bar_color' => '#FFF',
        		'cookie_text_color' => '#000',
        		'cookie_show_border' => 'disable',
        		'cookie_border_color' => '#FFF',
        		'font_global' => 'Times New Roman',
        		'font_global_style' => '',
        		'characters_sets' => '',
        		'h1_font_family' => 'Times New Roman',
        		'h1_size' => '30',
        		'h1_style' => '',
        		'h2_font_family' => 'Times New Roman',
        		'h2_size' => '25',
        		'h2_style' => '',
        		'h3_font_family' => 'Times New Roman',
        		'h3_size' => '20',
        		'h3_style' => '',
        		'body_font_family' => 'Times New Roman',
        		'body_size' => '20',
        		'body_style' => '',
        		'meta_info_font_family' => 'Times New Roman',
        		'meta_info_size' => '20',
        		'meta_info_style' => '',
        		'footer_font_family' => 'Times New Roman',
        		'footer_size' => '20',
        		'footer_style' => '',
        		'menu_font_family' => 'Times New Roman',
        		'menu_size' => '20',
        		'menu_style' => ''
        	)
        );
    }
}
