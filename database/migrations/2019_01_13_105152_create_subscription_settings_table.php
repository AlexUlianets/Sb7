<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('enable_subscription');
            $table->string('service_provide');
            $table->string('default_checkbox');
            $table->string('checkbox_label');
            $table->string('confirmation_label');
            $table->string('api_key');
            $table->string('api_url');
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
        Schema::dropIfExists('subscription_settings');
    }
}
