<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentdata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student')->unsigned()->nullable();
            $table->foreign('student')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');;
            $table->integer('typestudent')->unsigned();
            $table->foreign('typestudent')
                ->references('id')
                ->on('typestudent');
            $table->integer('adminget')->nullable()->unsigned()->nullable();
            $table->foreign('adminget')
                ->references('id')
                ->on('admins')
                ->onDelete('set null');
            $table->integer('adminset')->nullable()->unsigned()->nullable();
            $table->foreign('adminset')
                ->references('id')
                ->on('admins')
                ->onDelete('set null');
            //Document
            $table->boolean('doc1')->default(0)->nullable();
            $table->boolean('doc2')->default(0)->nullable();
            $table->boolean('doc3')->default(0)->nullable();
            $table->boolean('doc4')->default(0)->nullable();
            $table->boolean('doc5')->default(0)->nullable();
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
        Schema::dropIfExists('documentdata');
    }
}
