<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateLitecmsBlockBlocksTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: litecms_block_blocks
         */
        Schema::create('litecms_block_blocks', function ($table) {
            $table->increments('id');
            $table->integer('category_id')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('icon', 255)->nullable();
            $table->integer('order')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->text('images')->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('status', ['Draft', 'Active', 'Inactive'])->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_type', 100)->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->text('marking', 200)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
    * Reverse the migrations.
    *
    * @return void
    */

    public function down()
    {
        Schema::drop('litecms_block_blocks');
    }
}
