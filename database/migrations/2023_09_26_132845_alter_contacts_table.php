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
        Schema::table('contacts', function (Blueprint $table) {
            $table->renameColumn('email_address', 'email');
            $table->string('phone_number', 15)->change();
            $table->dropColumn('message');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->renameColumn('email', 'email_address');
            $table->string('phone_number', 20)->change();
            $table->text('message');
        });
    }
};
