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
        //Megcsinálja
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->primary('id');
            $table->string('category', 255)->notNull();
            $table->string('name', 191)->notNull();
            $table->string('description', 255);
            $table->string('picture', 255);
            $table->Integer('price');
            $table->Integer('stock');
            //Minta mezők

            //Személyes adatok
            $table->string('personName', 255)->default(null);
            $table->string('zipcode', 10)->default(null);
            $table->string('city', 100)->default(null);
            $table->string('adress', 255)->default(null);
            $table->string('phone', 50)->default(null);
            $table->date('dob')->default(null);

            // --- 2. Logikai (BOOLEAN) Alapértelmezett Értékkel
            // Alapértelmezés: FALSE (0)
            // TINYINT(1)
            $table->boolean('is_published')->default(false);

            // --- 3. Dátum (DATE)
            $table->date('start_date')->nullable()->default(null);

            // --- 4. Dátum és Idő (DATETIME) Alapértelmezett Értékkel
            // Alapértelmezés: NULL
            $table->dateTime('scheduled_posting')->nullable()->default(null);

            // --- 5. Idő (TIME)
            // Alapértelmezés: '09:00:00'
            $table->time('delivery_time')->default('09:00:00');

            // --- 6. Decimális (DECIMAL) Alapértelmezett Értékkel
            // Ár oszlop: 10 számjegy összesen, 2 tizedesjegy pontossággal.
            // Alapértelmezés: 0.00
            $table->decimal('final_price', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
