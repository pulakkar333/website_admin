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
        Schema::table('technical_supports', function (Blueprint $table) {
            // Add equipment_name column
            if (!Schema::hasColumn('technical_supports', 'equipment_name')) {
                $table->string('equipment_name')->nullable()->after('organization');
            }
            
            // Add preferred_contact_time
            if (!Schema::hasColumn('technical_supports', 'preferred_contact_time')) {
                $table->string('preferred_contact_time')->nullable()->after('message');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('technical_supports', function (Blueprint $table) {
            // Drop the new columns
            if (Schema::hasColumn('technical_supports', 'equipment_name')) {
                $table->dropColumn('equipment_name');
            }
            
            if (Schema::hasColumn('technical_supports', 'preferred_contact_time')) {
                $table->dropColumn('preferred_contact_time');
            }
        });
    }
};
