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
        //A meglévőt módosítja
        Schema::table('products', function (Blueprint $table) {
            //Egyedi indexet teszek a name mezőre
            $table->unique('name', 'products_name_unique');
            //Beteszek egy új oszlopot
            $table->boolean('is_published2')->default(false);
            //Módosítom a mező méretét
            $table->string('category', 200)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Nem törli le
        Schema::table('products', function (Blueprint $table) {
            // Eltávolítja az egyedi indexet az 'email' oszlopról
            $table->dropUnique(['name']);
            // VAGY az index nevével:
            // $table->dropUnique('products_name_unique');
            $table->dropColumn('is_published2');

            // 2. A string oszlop méretének visszaállítása az eredeti 100-ra
            // (Az "posts" tábla eredeti oszlop mérete feltételezve: 100)
            $table->string('category', 255)->change();
        });
    }
};
