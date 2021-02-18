<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisplayNodesTable extends Migration
{
    /**
     * Migration to create 'display_node' table
     *
     * @return void
     */
    public function up()
    {
        Schema::create('display_nodes', function (Blueprint $table) {
            $table->id('id');
            $table->string('node_title');
            $table->string('node_location');
            $table->string('node_mode');
            $table->LongText('node_description');

            $table->foreignId('user_id')
                ->constrained('users')
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
        Schema::dropIfExists('display_nodes');
    }
}
