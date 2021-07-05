<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();

            $table->string('meta_title');
            $table->text('meta_description');
            $table->string('slug');
            $table->string('breadcrumbs_anchor');

            $table->string('about_subtitle');
            $table->string('about_title');
            $table->text('about_description');
            $table->string('about_buttontext');
            $table->string('about_buttonlink');
            $table->string('about_image');
            $table->string('about_ytlink');
            $table->string('member_title_section');


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
        Schema::dropIfExists('about_settings');
    }
}
