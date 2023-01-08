<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('uuid', 36)->unique();
            $table->integer('user_id');
            $table->string('title');

            $table->smallInteger('1st_cate')->nullable();
            $table->smallInteger('2nd_cate')->nullable();
            $table->smallInteger('3rd_cate')->nullable();
            $table->integer('order')->nullable();

            $table->string('updated_by', 36)->nullable();
            $table->string('deleted_by', 36)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
