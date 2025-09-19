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
        Schema::table('properties', function (Blueprint $table) {
            // Add new columns
            $table->string('city')->nullable()->after('location');
            $table->string('state')->nullable()->after('city');
            $table->string('zip_code', 10)->nullable()->after('state');
            $table->boolean('is_featured')->default(false)->after('featured');
            $table->string('status')->default('available')->change(); // Change from boolean to string
            
            // Rename gallery to gallery_images for consistency
            $table->json('gallery_images')->nullable()->after('gallery');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            // Remove added columns
            $table->dropColumn(['city', 'state', 'zip_code', 'is_featured', 'gallery_images']);
            
            // Revert status back to boolean
            $table->boolean('status')->default(true)->change();
        });
    }
};
