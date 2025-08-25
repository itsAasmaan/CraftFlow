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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('theme')->default('minimal'); 
            $table->string('industry')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');

        Schema::table('projects', function (Blueprint $table) {
            $table->dropConstrainedForeignId('company_id');
        });
    }
};
