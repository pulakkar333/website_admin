<?php
  use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('footer_contacts', function (Blueprint $table) {

            // Rename first
            if (Schema::hasColumn('footer_contacts', 'mobile')) {
                $table->renameColumn('mobile', 'ordermobile');
            }

            // Then add new columns
            if (!Schema::hasColumn('footer_contacts', 'salesmobile')) {
                $table->string('salesmobile')->nullable()->after('mobile');
            }

            if (!Schema::hasColumn('footer_contacts', 'servicemobile')) {
                $table->string('servicemobile')->nullable()->after('salesmobile');
            }
        });
    }

    public function down(): void
    {
        Schema::table('footer_contacts', function (Blueprint $table) {

            if (Schema::hasColumn('footer_contacts', 'ordermobile')) {
                $table->renameColumn('ordermobile', 'mobile');
            }

            $table->dropColumn(['salesmobile', 'servicemobile']);
        });
    }
};