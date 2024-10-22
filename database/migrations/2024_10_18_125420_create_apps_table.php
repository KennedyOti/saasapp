<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsTable extends Migration
{
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->id('id'); // Primary Key
            $table->unsignedBigInteger('client_id'); // Foreign Key
            $table->string('app_name', 50);
            $table->text('description')->nullable();
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('apps');
    }
}
