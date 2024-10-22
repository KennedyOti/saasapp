<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id('id'); // Primary Key
            $table->unsignedBigInteger('client_id'); // Foreign Key
            $table->unsignedBigInteger('app_id'); // Foreign Key
            $table->string('section_name', 50);
            $table->text('remarks')->nullable();
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
