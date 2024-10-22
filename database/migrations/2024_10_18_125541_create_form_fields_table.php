<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFieldsTable extends Migration
{
    public function up()
    {
        Schema::create('form_fields', function (Blueprint $table) {
            $table->id('id'); // Primary Key
            $table->unsignedBigInteger('client_id'); // Foreign Key
            $table->unsignedBigInteger('app_id'); // Foreign Key
            $table->unsignedBigInteger('form_id'); // Foreign Key
            $table->string('field_name', 50);
            $table->string('field_description', 100)->nullable();
            $table->string('mouse_hover_tip', 100)->nullable();
            $table->string('field_type', 10); // E.g., text, number, date, etc.
            $table->integer('field_size')->nullable(); // For character and number fields
            $table->integer('decimals')->nullable(); // For number fields
            $table->string('field_format', 10)->nullable(); // E.g., single line, multi-line, etc.
            $table->text('remarks')->nullable();
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_fields');
    }
}
