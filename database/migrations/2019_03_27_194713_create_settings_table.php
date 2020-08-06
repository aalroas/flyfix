<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_icon')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_url')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_mobile')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_fax')->nullable();
            $table->string('site_whatsapp_url')->nullable();
            $table->string('site_instagram_url')->nullable();
            $table->string('site_facebook_url')->nullable();
            $table->string('site_twitter_url')->nullable();
            $table->string('site_linkedin_url')->nullable();
            $table->string('site_youtube_url')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
