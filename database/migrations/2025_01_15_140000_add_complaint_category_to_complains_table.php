<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add new column
        Schema::table('complains', function (Blueprint $table) {
            if (!Schema::hasColumn('complains', 'complaintCategory')) {
                $table->string('complaintCategory')->nullable()->after('company');
            }
        });

        // Migrate data from product to complaintCategory if product column exists
        if (Schema::hasColumn('complains', 'product')) {
            DB::table('complains')
                ->whereNull('complaintCategory')
                ->whereNotNull('product')
                ->update(['complaintCategory' => DB::raw('product')]);

            // Drop the old product column
            Schema::table('complains', function (Blueprint $table) {
                $table->dropColumn('product');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complains', function (Blueprint $table) {
            if (!Schema::hasColumn('complains', 'product')) {
                $table->string('product')->nullable()->after('company');
            }
        });

        if (Schema::hasColumn('complains', 'complaintCategory')) {
            DB::statement('UPDATE complains SET product = complaintCategory WHERE product IS NULL');
            Schema::table('complains', function (Blueprint $table) {
                $table->dropColumn('complaintCategory');
            });
        }
    }
};

