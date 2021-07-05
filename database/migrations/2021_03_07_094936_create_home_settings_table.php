<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();

            $table->string('meta_title');
            $table->text('meta_description');

            $table->string('fun_title');
            $table->text('fun_description');
            $table->string('count_number1');
            $table->text('count_description1');
            $table->string('count_number2');
            $table->text('count_description2');
            $table->string('count_number3');
            $table->text('count_description3');
            $table->string('count_number4');
            $table->text('count_description4');

            $table->string('about_subtitle');
            $table->string('about_title');
            $table->text('about_description');
            $table->string('about_buttontext');
            $table->string('about_buttonlink');
            $table->string('about_image1');
            $table->string('about_image2');
            $table->string('about_yearstitle');
            $table->string('about_yearstext');

            $table->string('services_title');

            $table->string('projects_title');
            $table->string('projects_subtitle');

            $table->string('blog_title');
            $table->string('blog_subtitle');


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
        Schema::dropIfExists('home_settings');
    }
}
