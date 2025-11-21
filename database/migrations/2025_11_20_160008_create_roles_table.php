<?php

// In: database/migrations/2025_11_20_160008_create_roles_table.php

use Illuminate\Support\Facades\Schema;

public function up()
{
    if (!Schema::hasTable('roles')) {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }
}
