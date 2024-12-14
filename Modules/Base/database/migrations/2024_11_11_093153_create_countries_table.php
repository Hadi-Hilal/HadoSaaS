<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('iso_code_2', 2)->unique()->index();
            $table->char('iso_code_3', 3)->unique()->index();
            $table->string('phone_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('countries');
    }
};
