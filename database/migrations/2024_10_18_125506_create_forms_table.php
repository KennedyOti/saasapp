<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id('id'); // Primary Key
            $table->unsignedBigInteger('client_id'); // Foreign Key
            $table->unsignedBigInteger('app_id'); // Foreign Key
            $table->string('form_name', 50);
            $table->string('form_description', 100)->nullable();
            $table->unsignedBigInteger('child_form_id')->nullable(); // Optional Foreign Key for child form relationship
            $table->string('default_form_style', 5)->default('form'); // Default to form style
            $table->text('remarks')->nullable();
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->foreign('child_form_id')->references('id')->on('forms')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
