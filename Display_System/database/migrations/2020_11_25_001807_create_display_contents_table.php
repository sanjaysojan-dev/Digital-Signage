<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisplayContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('display_contents', function (Blueprint $table) {
            $table->primary(['display_id', 'content_id']);

            $table->foreignId('display_id')
                ->constrained('displays')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('content_id')
                ->constrained('contents')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
