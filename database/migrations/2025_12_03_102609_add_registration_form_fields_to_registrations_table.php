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
        Schema::table('registrations', function (Blueprint $table) {
            // Add new fields for registration form
            if (!Schema::hasColumn('registrations', 'organization')) {
                $table->string('organization')->nullable()->after('company');
            }
            if (!Schema::hasColumn('registrations', 'designation')) {
                $table->string('designation')->nullable()->after('organization');
            }
            if (!Schema::hasColumn('registrations', 'department')) {
                $table->string('department')->nullable()->after('designation');
            }
            if (!Schema::hasColumn('registrations', 'city')) {
                $table->string('city')->nullable()->after('department');
            }
            if (!Schema::hasColumn('registrations', 'message')) {
                $table->text('message')->nullable()->after('city');
            }
            if (!Schema::hasColumn('registrations', 'file')) {
                $table->string('file')->nullable()->after('message');
            }
            if (!Schema::hasColumn('registrations', 'terms_accepted')) {
                $table->boolean('terms_accepted')->default(0)->after('file');
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
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn(['organization', 'designation', 'department', 'city', 'message', 'file', 'terms_accepted']);
        });
    }
};
