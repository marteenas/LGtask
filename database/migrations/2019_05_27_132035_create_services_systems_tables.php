<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesSystemsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('name');
            $table->timestamps();
            
            $table->foreign('parent_id')
                ->references('id')
                ->on('services')
                ->onDelete('set null');
        });
        
        Schema::create('systems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        
        Schema::create('service_has_systems', function (Blueprint $table) {
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('system_id');

            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade');

            $table->foreign('system_id')
                ->references('id')
                ->on('systems')
                ->onDelete('cascade');

            $table->primary(['service_id', 'system_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_has_systems');
        Schema::dropIfExists('services');
        Schema::dropIfExists('systems');
    }
}
