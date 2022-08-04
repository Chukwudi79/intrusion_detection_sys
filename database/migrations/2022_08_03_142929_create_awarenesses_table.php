<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwarenessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awarenesses', function (Blueprint $table) {
            $table->id();
            $table->string('caption')->nullable();
            $table->string('body')->nullable();
            $table->string('media_url')->nullable();
            $table->string('media_name')->nullable();
            $table->string('media_ext')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('awarenesses');
    }
}
