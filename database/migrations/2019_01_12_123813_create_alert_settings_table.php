<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('create_welcome_email');
            $table->string('create_welcome_notification');
            $table->string('order_email');
            $table->string('order_notification');
            $table->string('order_status_email');
            $table->string('order_status_notification');
            $table->string('new_list_email');
            $table->string('new_list_notification');
            $table->string('forgot_password_email');
            $table->string('forgot_password_notification');
            $table->string('add_new_list_email');
            $table->string('add_new_list_notification');
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
        Schema::dropIfExists('alert_settings');
    }
}
