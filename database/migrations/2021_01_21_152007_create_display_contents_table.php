<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisplayContentsTable extends Migration
{
    /**
     * Migration to create 'display_contents' table
     *
     * @return void
     */
    public function up()
    {
        Schema::create('display_contents', function (Blueprint $table) {
            $table->id('id');
            $table->string('content_title');
            $table->LongText('content_description');

            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('display_contents');
    }
}
