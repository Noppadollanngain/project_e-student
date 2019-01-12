<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status');
            $table->integer('admin_create')->nullable()->unsigned()->nullable();
            $table->foreign('admin_create')
                ->references('id')
                ->on('admins')
                ->onDelete('set null');
            $table->integer('admin_send')->nullable()->unsigned()->nullable();
            $table->foreign('admin_send')
                ->references('id')
                ->on('admins')
                ->onDelete('set null');
            $table->string('header');
            $table->text('message');
            $table->string('image');
            $table->integer('typestudent')->unsigned();
            $table->foreign('typestudent')
                ->references('id')
                ->on('typestudent');
            $table->timestamp('create_message')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('send_message')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
