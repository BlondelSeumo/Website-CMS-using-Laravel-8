<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_settings', function (Blueprint $table) {
            $table->id();

            $table->string('meta_title');
            $table->text('meta_description');
            $table->string('slug');
            $table->string('breadcrumbs_anchor');

            $table->string('title');
            $table->text('description');


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
        Schema::dropIfExists('pricing_settings');
    }
}
