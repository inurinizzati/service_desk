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
        Schema::table('users', function (Blueprint $table) {
            // Add userid column (unique, nullable, after id)
            $table->string('userid')->unique()->nullable()->after('id');
            
            // Add role_id column (foreign key to roles table)
            $table->foreignId('role_id')->nullable()->after('email');
            
            // Add is_active column (boolean, defaults to true)
            $table->boolean('is_active')->default(true)->after('role_id');
            
            // Add phone_num column (nullable)
            $table->string('phone_num')->nullable()->after('is_active');
            
            // Add foreign key constraint for role_id
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['role_id']);
            
            // Drop columns
            $table->dropColumn(['userid', 'role_id', 'is_active', 'phone_num']);
        });
    }
};