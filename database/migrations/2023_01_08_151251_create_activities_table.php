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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('activity_name')->required();
            $table->time('start_time')->required();
            $table->time('final_hour')->required();
            $table->string('consecutive')->required();
            $table->date('activity_date')->useCurrent()->required();

            $table->unsignedBigInteger('nac_id')->required();
            $table->foreign('nac_id')->references('id')->on('nacs');

            $table->unsignedBigInteger('expertise_id')->required();
            $table->foreign('expertise_id')->references('id')->on('expertises');

            $table->unsignedBigInteger('cultural_right_id')->required();
            $table->foreign('cultural_right_id')->references('id')->on('cultural_rights');

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
        Schema::dropIfExists('activities');
    }
};
