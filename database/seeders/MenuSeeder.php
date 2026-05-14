<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        // botones principales
        $inicio = Menu::create(['nombre' => 'INICIO', 'url' => '/', 'orden' => 1]);
        $tips = Menu::create(['nombre' => 'TIPS
        ', 'url' => '#', 'orden' => 2]);
        $contacto = Menu::create(['nombre' => 'CONTACTO', 'url' => '#', 'orden' => 3]);

        Menu::create(['nombre' => 'Maquillaje', 'url' => '/tips/maquillaje', 'parent_id' => $tips->id, 'orden' => 1]);
        Menu::create(['nombre' => 'Facial', 'url' => '/tips/facial', 'parent_id' => $tips->id, 'orden' => 2]);
        Menu::create(['nombre' => 'Cabello', 'url' => '/tips/cabello', 'parent_id' => $tips->id, 'orden' => 3]);
    }
}
