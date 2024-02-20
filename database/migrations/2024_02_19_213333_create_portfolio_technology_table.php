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
        Schema::create('portfolio_technology', function (Blueprint $table) {
            $table->unsignedBigInteger('portfolio_id');
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->cascadeOnDelete();

            $table -> unsignedBigInteger('technology_id');
            $table->foreign('technology_id')->references('id')->on('technologies');
            
            $table->primary(['portfolio_id', 'technology_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_technology');
    }
};
