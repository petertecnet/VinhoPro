<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('permissions');
            $table->timestamps();
        });

        // Inserindo perfis fictícios
        $profiles = [
            [
                'name' => 'Administrador',
                'permissions' => json_encode(['user_list', 'user_create', 'user_view', 'user_edit', 'user_delete', 'user_config', 'profile_create','profile_view', 'profile_delete', 'profile_edit', 'category_create', 'category_view', 'category_delete', 'category_edit', 'product_create', 'product_view', 'product_delete', 'product_edit']),
            ],
            [
                'name' => 'Vendedor',
                'permissions' => json_encode(['category_view','product_create', 'product_view', 'product_edit']),
            ],
            [
                'name' => 'Cliente',
                'permissions' => json_encode([]),
            ],
        ];

        foreach ($profiles as $profile) {
            DB::table('profiles')->insert($profile);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
}
