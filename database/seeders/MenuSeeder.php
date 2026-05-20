<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('menus')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Menús Principales
        Menu::create(['id' => 1, 'nombre' => 'INICIO', 'url' => '/', 'parent_id' => null, 'orden' => 1]);
        Menu::create(['id' => 7, 'nombre' => 'RECIENTES', 'url' => '/tips', 'parent_id' => null, 'orden' => 2]);
        Menu::create(['id' => 2, 'nombre' => 'CATEGORÍAS', 'url' => '#', 'parent_id' => null, 'orden' => 3]);

        // Submenús Hijos 
        Menu::create(['id' => 4, 'nombre' => 'Maquillaje', 'url' => '/categoria/maquillaje', 'parent_id' => 2, 'orden' => 1]);
        Menu::create(['id' => 5, 'nombre' => 'Facial', 'url' => '/categoria/facial', 'parent_id' => 2, 'orden' => 2]);
        Menu::create(['id' => 6, 'nombre' => 'Cabello', 'url' => '/categoria/cabello', 'parent_id' => 2, 'orden' => 3]);
    }
}
