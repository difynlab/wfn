<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tables = [
            'users',
            'companies',
            'warehouses',
            'bookings',
            'todos',
            'articles',
            'article_categories',
            'storage_types',
            'licenses',
            'movement_services',
            'pallet_services',
            'reviews',
            'reports',
            'subscriptions',
            'supports',
            'warehouse_reviews',
            'conversations',
            'message_replies',
        ];

        foreach ($tables as $table) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, 'status')) {
                DB::statement("ALTER TABLE `{$table}` MODIFY `status` TINYINT UNSIGNED NOT NULL DEFAULT 1");
            }
        }

        if (Schema::hasTable('messages')) {
            foreach (['admin_status', 'user_status', 'status'] as $column) {
                if (Schema::hasColumn('messages', $column)) {
                    DB::statement("ALTER TABLE `messages` MODIFY `{$column}` TINYINT UNSIGNED NOT NULL DEFAULT 1");
                }
            }
        }
    }

    public function down(): void
    {
    }
};
