<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Inserindo usuários fictícios
        $users = [
            ['name' => 'Administração Master', 'email' => 'admin@example.com', 'password' => Hash::make('admin123'), 'profile_id' => 1],
            ['name' => 'Super Vendedor', 'email' => 'vendedor@example.com', 'password' => Hash::make('vendedor123'), 'profile_id' => 2],
            ['name' => 'Cliente Premium', 'email' => 'cliente1@example.com', 'password' => Hash::make('cliente1123'), 'profile_id' => 3],
            ['name' => 'Cliente VIP', 'email' => 'cliente2@example.com', 'password' => Hash::make('cliente2123'), 'profile_id' => 3],
            ['name' => 'Cliente Gold', 'email' => 'cliente3@example.com', 'password' => Hash::make('cliente3123'), 'profile_id' => 3],
            ['name' => 'Cliente Prata', 'email' => 'cliente4@example.com', 'password' => Hash::make('cliente4123'), 'profile_id' => 3],
            ['name' => 'Cliente Bronze', 'email' => 'cliente5@example.com', 'password' => Hash::make('cliente5123'), 'profile_id' => 3],
            ['name' => 'Cliente Diamante', 'email' => 'cliente6@example.com', 'password' => Hash::make('cliente6123'), 'profile_id' => 3],
            ['name' => 'Cliente Safira', 'email' => 'cliente7@example.com', 'password' => Hash::make('cliente7123'), 'profile_id' => 3],
            ['name' => 'Cliente Esmeralda', 'email' => 'cliente8@example.com', 'password' => Hash::make('cliente8123'), 'profile_id' => 3],
            ['name' => 'Cliente Rubi', 'email' => 'cliente9@example.com', 'password' => Hash::make('cliente9123'), 'profile_id' => 3],
            ['name' => 'Cliente Topázio', 'email' => 'cliente10@example.com', 'password' => Hash::make('cliente10123'), 'profile_id' => 3],
            // Adicione mais usuários fictícios se necessário
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
