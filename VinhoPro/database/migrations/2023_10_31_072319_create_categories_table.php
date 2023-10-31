<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Inserindo categorias de vinhos fictícias
        $categories = [
            ['name' => 'Cabernet Sauvignon'],
            ['name' => 'Merlot'],
            ['name' => 'Pinot Noir'],
            ['name' => 'Chardonnay'],
            ['name' => 'Sauvignon Blanc'],
            ['name' => 'Syrah'],
            ['name' => 'Zinfandel'],
            ['name' => 'Malbec'],
            ['name' => 'Riesling'],
            ['name' => 'Grenache'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
