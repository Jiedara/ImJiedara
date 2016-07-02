<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldPageTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_translations', function (Blueprint $table) {
            $table->string('slug');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->text('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_translations', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');
            $table->dropColumn('content');
        });
    }
}
