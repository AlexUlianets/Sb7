<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('show_name_after');
            $table->string('enable_breadcumbs');
            $table->string('between_breadcumbs');
            $table->string('anchor_for_homepage');
            $table->string('prefix_list_category');
            $table->string('prefix_search_page');
            $table->string('breadcumb_for_404');
            $table->string('bold_last_page');
            $table->string('google_webmaster_tools');
            $table->string('bing_webmaster_tools');
            $table->string('pinterest_webmaster_tools');
            $table->string('seo_title');
            $table->text('seo_description');
            $table->text('seo_keywords');
            $table->string('list_title_as_meta_title');
            $table->string('list_description_as_meta_description');
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
        Schema::dropIfExists('seo_settings');
    }
}
