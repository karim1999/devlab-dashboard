<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SiteProfileKeyWords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_profiles', function (Blueprint $table) {
            $table->text('ar_keywords')->nullable();
            $table->text('en_keywords')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_profiles', function (Blueprint $table) {
            $table->dropColumn('ar_keywords');
            $table->dropColumn('en_keywords');
        });
    }
}
