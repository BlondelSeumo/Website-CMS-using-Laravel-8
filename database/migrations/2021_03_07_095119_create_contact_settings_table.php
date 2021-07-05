<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();

            $table->string('meta_title');
            $table->text('meta_description');
            $table->string('slug');
            $table->string('breadcrumbs_anchor');

            $table->string('box_icon1');
            $table->string('box_icon2');
            $table->string('box_icon3');

            $table->string('box_title1');
            $table->string('box_title2');
            $table->string('box_title3');

            $table->text('box_html1');
            $table->text('box_html2');
            $table->text('box_html3');

            $table->string('form_title');
            $table->string('form_input_name');
            $table->string('form_input_email');
            $table->string('form_input_budget');
            $table->string('form_input_phone');
            $table->text('form_message');

            $table->string('button_text');
            $table->string('button_link');
            $table->string('mailto');

            $table->string('title');
            $table->text('iframe_txt');

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
        Schema::dropIfExists('contact_settings');
    }
}
