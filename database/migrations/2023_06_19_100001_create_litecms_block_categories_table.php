<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateLitecmsBlockCategoriesTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: litecms_block_categories
         */
        Schema::create('litecms_block_categories', function ($table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('slug', 200)->nullable();
            $table->string('title', 200)->nullable();
            $table->text('details')->nullable();
            $table->text('image')->nullable();
            $table->enum('status', ['Draft', 'Active', 'Inactive'])->nullable();
            $table->string('user_type', 100)->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::drop('litecms_block_categories');
    }
}
