<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleDetailsImageToClientCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_categories', function (Blueprint $table) {
            $table->string('title')->nullable()->after('name');
            $table->text('details')->nullable()->after('title');
            $table->string('image')->nullable()->after('details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_categories', function (Blueprint $table) {
            $table->dropColumn(['title', 'details', 'image']);
        });
    }
}

