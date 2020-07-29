<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('site_id');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
 
            $table->boolean('popup_status')->default(true);
            $table->text('popup_ar')->nullable();
            $table->text('popup_en')->nullable();
            $table->boolean('intro_status')->default(true);
            $table->text('intro_ar')->nullable();
            $table->text('intro_en')->nullable();
            $table->boolean('header_status')->default(true);
            $table->text('header_ar')->nullable();
            $table->text('header_en')->nullable();
            $table->boolean('scroll_status')->default(true);
            $table->text('scroll_ar')->nullable();
            $table->text('scroll_en')->nullable();
            $table->boolean('adv_status')->default(true);
            $table->text('adv_ar')->nullable();
            $table->text('adv_en')->nullable();



            $table->text('note')->nullable();
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
        Schema::dropIfExists('advs');
    }
}
