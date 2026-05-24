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
        Schema::create('managing_directors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // MD name
            $table->string('designation')->default('Managing Director'); // Title
            $table->text('message')->nullable(); // MD's message/speech
            $table->json('career_highlights')->nullable(); // Career highlights as JSON array
            $table->string('image')->nullable(); // Profile photo
            $table->string('signature')->nullable(); // Signature image
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
        Schema::dropIfExists('managing_directors');
    }
};
