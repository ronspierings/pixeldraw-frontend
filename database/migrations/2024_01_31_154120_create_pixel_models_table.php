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
        Schema::create('pixel_models', function (Blueprint $table) {
            
            $table->integer('pos_x')->unsigned();
            $table->integer('pos_y')->unsigned();
            $table->string('color')->length(7);

            $table->primary(['pos_x', 'pos_y']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pixel_models');
    }
};
