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
        Schema::table('ask_experts', function (Blueprint $table) {
            $table->string('organization')->nullable()->after('phone');
            $table->string('topicOfInquiry')->nullable()->after('organization');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ask_experts', function (Blueprint $table) {
            $table->dropColumn(['organization', 'topicOfInquiry']);
        });
    }
};

