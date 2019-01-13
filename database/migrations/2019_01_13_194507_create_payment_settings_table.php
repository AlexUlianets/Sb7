<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('live_client_id');
            $table->string('live_client_secret');
            $table->string('live_access_token');
            $table->string('live_access_token_expiry');
            $table->string('sandbox_mode');
            $table->string('sandbox_client_id');
            $table->string('sandbox_client_secret');
            $table->string('sandbox_access_token');
            $table->string('sandbox_access_token_expiry');
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
        Schema::dropIfExists('payment_settings');
    }
}
