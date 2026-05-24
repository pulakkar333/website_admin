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
        Schema::table('dealerships', function (Blueprint $table) {
            $table->string('trade_license_tin')->nullable()->after('address');
            $table->string('business_type')->nullable()->after('trade_license_tin');
            $table->string('years_of_experience')->nullable()->after('business_type');
            $table->string('area_of_interest')->nullable()->after('years_of_experience');
            $table->string('document_file')->nullable()->after('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dealerships', function (Blueprint $table) {
            $table->dropColumn(['trade_license_tin', 'business_type', 'years_of_experience', 'area_of_interest', 'document_file']);
        });
    }
};
