<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginmonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loginmonitors', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('log_attempt')->nullable();
            $table->string('log_type')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('type')->nullable();
            $table->string('device_type')->nullable();
            $table->string('browser_type')->nullable();
            $table->string('state')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loginmonitors');
    }
}
