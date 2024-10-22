<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabsSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('tabs_sections', function (Blueprint $table) {
            $table->id('id'); // Primary Key
            $table->unsignedBigInteger('client_id'); // Foreign Key
            $table->unsignedBigInteger('app_id'); // Foreign Key
            $table->unsignedBigInteger('tab_id'); // Foreign Key
            $table->unsignedBigInteger('section_id'); // Foreign Key
            $table->text('remarks')->nullable();
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->foreign('tab_id')->references('id')->on('tabs')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabs_sections');
    }
}
