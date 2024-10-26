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
        Schema::table('cart_details', function (Blueprint $table) {

            $table->dropForeign(['promo_code_id']);

            $table->dropColumn('promo_code_id');
            $table->dropColumn('price');
            $table->dropColumn('discount');
            $table->dropColumn('promo_applied');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart_details', function (Blueprint $table) {
            //
        });
    }
};
