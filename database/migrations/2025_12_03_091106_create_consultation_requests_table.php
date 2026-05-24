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
        Schema::create('consultation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('organization_name');
            $table->string('email');
            $table->string('phone');
            $table->enum('topic_of_inquiry', ['Product Info', 'Technical', 'Service', 'Training', 'Other'])->default('Product Info');
            $table->text('message')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('consultation_requests');
    }
};
