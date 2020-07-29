<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->unsignedBigInteger('site_id');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');;

            $table->text('logo_ar_path')->nullable();
            $table->text('logo_en_path')->nullable();

            $table->text('logo_ar_path_dark')->nullable();
            $table->text('logo_en_path_dark')->nullable();


            $table->text('icon_ar')->nullable();
            $table->text('icon_en')->nullable();

            $table->text('site_name_ar')->nullable();
            $table->text('site_sub_name_ar')->nullable();
            $table->text('site_description_ar')->nullable();
            
            
            $table->text('view_id')->nullable();
            $table->text('credentials_statistics')->nullable();
            
            $table->text('site_name_en')->nullable();
            $table->text('site_sub_name_en')->nullable();
            $table->text('site_description_en')->nullable();

            $table->text('google_analytics')->nullable();

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
        Schema::dropIfExists('site_profiles');
    }
}
