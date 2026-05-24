<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaderships', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Leader name
            $table->string('designation'); // Position/title
            $table->text('details')->nullable(); // Bio/description
            $table->string('image')->nullable(); // Profile photo
            $table->integer('order')->default(0); // Display order
            $table->boolean('status')->default(1); // Active/Inactive
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
        Schema::dropIfExists('leaderships');
    }
};
