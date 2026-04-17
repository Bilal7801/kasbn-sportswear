<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('password');
            $table->text('bio')->nullable()->after('phone');
            $table->string('profile_image')->nullable()->after('bio');
        });
    }

    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn(['phone', 'bio', 'profile_image']);
        });
    }
};
