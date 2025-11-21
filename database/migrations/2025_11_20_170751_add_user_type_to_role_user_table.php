<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->string('user_type')->default(App\Models\User::class)->after('role_id');
        });
    }

    public function down()
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropColumn('user_type');
        });
    }

};
