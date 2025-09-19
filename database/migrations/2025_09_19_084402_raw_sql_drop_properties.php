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
        // Use raw SQL to completely drop and recreate the properties table
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE IF EXISTS properties;');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        
        // Recreate the properties table
        DB::statement('
            CREATE TABLE properties (
                id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                description TEXT NOT NULL,
                location VARCHAR(255) NOT NULL,
                city VARCHAR(255) NOT NULL,
                state VARCHAR(255) NOT NULL,
                zip_code VARCHAR(10) NOT NULL,
                type VARCHAR(255) NOT NULL,
                price DECIMAL(15,2) NOT NULL,
                bedrooms INT NOT NULL,
                bathrooms INT NOT NULL,
                area INT NOT NULL,
                image VARCHAR(255) NULL,
                gallery JSON NULL,
                featured BOOLEAN DEFAULT FALSE,
                is_featured BOOLEAN DEFAULT FALSE,
                status BOOLEAN DEFAULT TRUE,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL
            )
        ');
        
        // Recreate the foreign key constraint (only if it doesn't exist)
        try {
            DB::statement('
                ALTER TABLE inquiries 
                ADD CONSTRAINT inquiries_property_id_foreign 
                FOREIGN KEY (property_id) REFERENCES properties(id) ON DELETE CASCADE
            ');
        } catch (Exception $e) {
            // Foreign key constraint already exists, that's fine
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE IF EXISTS properties;');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
};
