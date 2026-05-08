<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('saved_carts', 'uuid')) {
            Schema::table('saved_carts', function (Blueprint $table) {
                $table->uuid('uuid')->nullable()->after('id');
            });
        }

        DB::table('saved_carts')
            ->where(function ($q) {
                $q->whereNull('uuid')->orWhere('uuid', '');
            })
            ->orderBy('id')
            ->each(function ($row) {
                DB::table('saved_carts')->where('id', $row->id)->update(['uuid' => (string) Str::uuid()]);
            });

        Schema::table('saved_carts', function (Blueprint $table) {
            $table->uuid('uuid')->nullable(false)->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('saved_carts', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }
};
