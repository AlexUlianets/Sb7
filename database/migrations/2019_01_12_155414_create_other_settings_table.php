<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gzip_compression');
            $table->string('enable_captcha');
            $table->string('captcha_site_key');
            $table->string('captcha_secret');
            $table->string('captcha_on_signup');
            $table->string('captcha_on_list');
            $table->string('captcha_on_login');
            $table->string('captcha_on_forget');
            $table->text('before_head_css');
            $table->text('end_body_tag_css');
            $table->text('cookie_message');
            $table->string('cookie_bar_position');
            $table->string('cookie_bar_color');
            $table->string('cookie_text_color');
            $table->string('cookie_show_border');
            $table->string('cookie_border_color');
            $table->string('font_global');
            $table->string('font_global_style');
            $table->string('characters_sets');
            $table->string('h1_font_family');
            $table->string('h1_size');
            $table->string('h1_style');
            $table->string('h2_font_family');
            $table->string('h2_size');
            $table->string('h2_style');
            $table->string('h3_font_family');
            $table->string('h3_size');
            $table->string('h3_style');
            $table->string('body_font_family');
            $table->string('body_size');
            $table->string('body_style');
            $table->string('meta_info_font_family');
            $table->string('meta_info_size');
            $table->string('meta_info_style');
            $table->string('footer_font_family');
            $table->string('footer_size');
            $table->string('footer_style');
            $table->string('menu_font_family');
            $table->string('menu_size');
            $table->string('menu_style');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('other_settings');
    }
}
