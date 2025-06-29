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
        Schema::create('device_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dev_id');
            $table->double('ph');
            $table->decimal('ec', 10, 2); 
            $table->decimal('tds', 10, 2); 
            $table->double('temp');
            $table->decimal('tur', 10, 2); 
            $table->string('lati')->nullable();
            $table->string('longi')->nullable();
            $table->timestamps();
            
          
            $table->foreign('dev_id')
                  ->references('id')
                  ->on('devices')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_data');
    }
};
