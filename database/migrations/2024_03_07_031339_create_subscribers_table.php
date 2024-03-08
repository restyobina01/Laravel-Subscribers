<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->unsignedBigInteger('provider_id')->nullable();
            $table->foreign('provider_id', 'fk_subscribers_provider_id')
                ->references('id')->on('providers')
                ->onDelete('cascade'); // Set onDelete behavior to SET NULL
            $table->string('number');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
}







