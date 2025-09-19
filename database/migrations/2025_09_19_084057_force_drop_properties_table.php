<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Disable foreign key checks temporarily
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Drop all possible foreign key constraints that might reference properties
        try {
            DB::statement('ALTER TABLE inquiries DROP FOREIGN KEY inquiries_property_id_foreign');
        } catch (Exception $e) {
            // Foreign key might not exist or have different name
        }
        
        try {
            DB::statement('ALTER TABLE inquiries DROP FOREIGN KEY property_id');
        } catch (Exception $e) {
            // Foreign key might not exist or have different name
        }
        
        // Drop the properties table
        Schema::dropIfExists('properties');
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        // Recreate the properties table
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code', 10);
            $table->string('type');
            $table->decimal('price', 15, 2);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('area');
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        
        // Recreate the foreign key constraint
        Schema::table('inquiries', function (Blueprint $table) {
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Disable foreign key checks temporarily
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Drop foreign key constraint
        try {
            DB::statement('ALTER TABLE inquiries DROP FOREIGN KEY inquiries_property_id_foreign');
        } catch (Exception $e) {
            // Foreign key might not exist
        }
        
        // Drop the properties table
        Schema::dropIfExists('properties');
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
