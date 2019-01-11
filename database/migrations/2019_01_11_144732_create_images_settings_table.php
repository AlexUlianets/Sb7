<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('api_key');
            $table->string('compress_bg');
            $table->string('compress_upload');
            $table->string('not_compress_auto');
            $table->string('sizes_compress');
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
        Schema::dropIfExists('images_settings');
    }
}
