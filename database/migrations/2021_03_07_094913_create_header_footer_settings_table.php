<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderFooterSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_footer_settings', function (Blueprint $table) {
            $table->id();

            $table->string('sidebar_title');
            $table->text('sidebar_description');

            $table->string('typed_title');
            $table->text('typed_text');
            $table->string('typed_buttontext');
            $table->string('typed_buttonlink');

            $table->string('footer_col1_subtitle');
            $table->string('footer_col1_title');
            $table->string('footer_col1_buttontext');
            $table->string('footer_col1_buttonlink');

            $table->string('footer_col2_title1');
            $table->string('footer_col2_title2');
            $table->text('footer_col2_html1');
            $table->text('footer_col2_html2');
            $table->text('footer_copyright');

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
        Schema::dropIfExists('header_footer_settings');
    }
}
