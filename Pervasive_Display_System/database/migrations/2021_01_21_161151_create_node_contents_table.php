<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodeContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_contents', function (Blueprint $table) {

            $table->id('id');

            $table->foreignId('node_id')
                ->constrained('display_nodes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('display_contents')
                ->constrained('display_contents')
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
        Schema::dropIfExists('node_contents');
    }
}
