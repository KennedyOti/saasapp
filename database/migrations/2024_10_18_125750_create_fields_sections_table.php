<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('fields_sections', function (Blueprint $table) {
            $table->id('id'); // Primary Key
            $table->unsignedBigInteger('client_id'); // Foreign Key
            $table->unsignedBigInteger('app_id'); // Foreign Key
            $table->unsignedBigInteger('section_id'); // Foreign Key
            $table->unsignedBigInteger('form_id'); // Foreign Key
            $table->string('field_name', 50);
            $table->text('remarks')->nullable();
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fields_sections');
    }
}
