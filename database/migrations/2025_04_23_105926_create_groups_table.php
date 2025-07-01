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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Kutab::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->boolean('for_sex');

            $table->foreignId('week_day_id')->nullable()->constrained('week_days')->nullOnDelete();
            $table->tinyInteger('hour')->nullable();
            $table->tinyInteger('minute')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
