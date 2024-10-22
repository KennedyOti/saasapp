<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('client_name', 50);
            $table->text('address')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('person_in_charge', 100)->nullable();
            $table->string('email', 50)->unique(); // Unique email for login
            $table->string('password'); // Password field
            $table->timestamp('date_joined')->nullable(); // Date client joined
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
