<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {

        \App\Models\Menu::truncate();


        $inicio = \App\Models\Menu::create(['id' => 1, 'nombre' => 'INICIO', 'url' => '/', 'parent_id' => null, 'orden' => 1]);
        $categorias = \App\Models\Menu::create(['id' => 2, 'nombre' => 'CATEGORÍAS', 'url' => '#', 'parent_id' => null, 'orden' => 3]);
        $recientes = \App\Models\Menu::create(['id' => 7, 'nombre' => 'RECIENTES', 'url' => '/tips', 'parent_id' => null, 'orden' => 2]);


        \App\Models\Menu::create(['id' => 4, 'nombre' => 'Maquillaje', 'url' => '/categoria/maquillaje', 'parent_id' => $categorias->id, 'orden' => 1]);
        \App\Models\Menu::create(['id' => 5, 'nombre' => 'Facial', 'url' => '/categoria/facial', 'parent_id' => $categorias->id, 'orden' => 2]);
        \App\Models\Menu::create(['id' => 6, 'nombre' => 'Cabello', 'url' => '/categoria/cabello', 'parent_id' => $categorias->id, 'orden' => 3]);
    }
}
