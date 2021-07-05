<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            
            $table->string('title');
            $table->text('favicon');
            $table->text('keywords');
            
            $table->text('facebook_pixel');
            $table->boolean('facebook_pixel_switch')->default(1);

            $table->text('analytics');
            $table->boolean('analytics_switch')->default(1);

            $table->text('SchmeaORG');
            $table->boolean('SchmeaORG_switch')->default(1);

            $table->text('OGgraph');
            $table->boolean('OGgraph_switch')->default(1);
            
            $table->string('photo_id')->nullable();
            
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
