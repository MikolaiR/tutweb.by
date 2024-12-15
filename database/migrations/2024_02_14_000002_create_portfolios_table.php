<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('slug')->unique();
            $table->json('description');
            $table->json('content');
            $table->string('client')->nullable();
            $table->date('completed_at')->nullable();
            $table->string('url')->nullable();
            $table->json('meta_title');
            $table->json('meta_description');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('portfolio_service', function (Blueprint $table) {
            $table->foreignId('portfolio_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->primary(['portfolio_id', 'service_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_service');
        Schema::dropIfExists('portfolios');
    }
};
