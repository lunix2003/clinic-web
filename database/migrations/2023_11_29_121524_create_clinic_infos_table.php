<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clinic_infos', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->longText("address")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("working")->nullable();
            $table->string("map")->nulable();          
            $table->string("facebook")->nulable();          
            $table->string("twitter")->nulable();          
            $table->string("youtube")->nulable();          
            $table->string("linkedin")->nulable();          
            $table->string("instagram")->nulable();          
            $table->string("photo")->nullable();
            $table->boolean("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinic_infos');
    }
};
