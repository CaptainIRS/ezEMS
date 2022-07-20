<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->text('rules')->nullable();
            $table->text('prizes')->nullable();
            $table->text('resources')->nullable();
            $table->integer('max_participants')->nullable();
            $table->decimal('registration_fee')->nullable();
            $table->text('contact')->nullable();

            $table->foreignId('cluster_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
