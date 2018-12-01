<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDocumentdata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_documentdata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student')->unsigned();
            $table->foreign('student')
                ->references('id')
                ->on('users');
            $table->integer('typestudent')->unsigned();
            $table->foreign('typestudent')
                ->references('id')
                ->on('table_typestudent');
           $table->integer('adminget')->unsigned();
            $table->foreign('adminget')
                ->references('id')
                ->on('admins');
            $table->integer('adminset')->nullable()->unsigned();
            $table->foreign('adminset')
                ->references('id')
                ->on('admins');
            //Document
            $table->boolean('doc1');
            $table->boolean('doc2');
            $table->boolean('doc3');
            $table->boolean('doc4');
            $table->boolean('doc5');
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
        Schema::dropIfExists('table_documentdata');
    }
}
