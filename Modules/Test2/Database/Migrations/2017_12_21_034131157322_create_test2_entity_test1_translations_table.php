<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTest2Entity_test1TranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test2__entity_test1_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('entity_test1_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['entity_test1_id', 'locale']);
            $table->foreign('entity_test1_id')->references('id')->on('test2__entity_test1s')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test2__entity_test1_translations', function (Blueprint $table) {
            $table->dropForeign(['entity_test1_id']);
        });
        Schema::dropIfExists('test2__entity_test1_translations');
    }
}
