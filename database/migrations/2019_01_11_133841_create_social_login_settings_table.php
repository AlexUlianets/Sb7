<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialLoginSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_login_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('all_settings');
            $table->string('facebook');
            $table->string('facebook_id');
            $table->string('facebook_secret');
            $table->string('google');
            $table->string('google_id');
            $table->string('google_secret');
            $table->string('twitter');
            $table->string('twitter_id');
            $table->string('twitter_secret');
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
        Schema::dropIfExists('social_login_settings');
    }
}
