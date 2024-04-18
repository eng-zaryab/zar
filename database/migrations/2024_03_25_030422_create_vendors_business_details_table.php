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
        Schema::create('vendors_business_details', function (Blueprint $table) {
            $table -> id();
            $table -> integer('vendor_id');
            $table -> string('res_name');
            $table -> string('res_address');
            $table -> string('res_city');
            $table -> string('res_state');
            $table -> string('res_zip');
            $table -> string('res_country');
            $table -> string('res_mobile');
            $table -> string('res_email');
            $table -> string('res_website');
            $table -> string('res_facebook');
            $table -> string('res_whatsapp');
            $table -> string('res_address_proof');
            $table -> string('address_proof_image');
            $table -> string('business_licence_number');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors_business_details');
    }
};
