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
        Schema::create('vendors', function (Blueprint $table) {
            $table -> id();
            $table -> string('name');
            $table -> string('last_name');
            $table -> string('address');
            $table -> string('city');
            $table -> string('state');
            $table -> string('zip_code');
            $table -> string('country');
            $table -> string('mobile');
            $table -> string('email')->unique();
            $table -> string('whatsapp');
            $table -> string('facebook_page');
            $table -> tinyInteger('status');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
