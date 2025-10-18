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
        Schema::table('clientes', function (Blueprint $table) {
            if (!Schema::hasColumn('clientes', 'nombre')) {
                $table->string('nombre')->nullable()->after('id');
            }
            if (!Schema::hasColumn('clientes', 'fecha_nac')) {
                $table->date('fecha_nac')->nullable()->after('nombre');
            }
            if (!Schema::hasColumn('clientes', 'rfc')) {
                $table->string('rfc')->nullable()->after('fecha_nac');
            }
            if (!Schema::hasColumn('clientes', 'edad')) {
                $table->integer('edad')->nullable()->after('rfc');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            if (Schema::hasColumn('clientes', 'edad')) {
                $table->dropColumn('edad');
            }
            if (Schema::hasColumn('clientes', 'rfc')) {
                $table->dropColumn('rfc');
            }
            if (Schema::hasColumn('clientes', 'fecha_nac')) {
                $table->dropColumn('fecha_nac');
            }
            if (Schema::hasColumn('clientes', 'nombre')) {
                $table->dropColumn('nombre');
            }
        });
    }
};
