<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        $date = new DateTime();
        $unixTimeStamp = $date->getTimestamp();

        DB::connection('mysql')->table('roles')->insert([
            [
                'created_at'=>new DateTime(),
                'updated_at'=>new DateTime(),
                'type'=>"Super Admin",
                'description'=>'Company cyber security agent',
            ],
            [
                'created_at'=>new DateTime(),
                'updated_at'=>new DateTime(),
                'type'=>"Sub Admin",
                'description'=>'Company sub admin of a company ',
            ],
            [
                'created_at'=>new DateTime(),
                'updated_at'=>new DateTime(),
                'type'=>"System Admin",
                'description'=>'Company Admin of the system',
            ],
            [
                'created_at'=>new DateTime(),
                'updated_at'=>new DateTime(),
                'type'=>"Staff",
                'description'=>'Company staff',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
