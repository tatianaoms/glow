<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        if (Menu::count() > 0) {
            return;
        }

        // Menús principales
        Menu::create([
            'id' => 1,
            'nombre' => 'INICIO',
            'url' => '/',
            'parent_id' => null,
            'orden' => 1
        ]);

        Menu::create([
            'id' => 2,
            'nombre' => 'RECIENTES',
            'url' => '/tips',
            'parent_id' => null,
            'orden' => 2
        ]);

        Menu::create([
            'id' => 3,
            'nombre' => 'CATEGORÍAS',
            'url' => '#',
            'parent_id' => null,
            'orden' => 3
        ]);

        // Submenús
        Menu::create([
            'id' => 4,
            'nombre' => 'Maquillaje',
            'url' => '/categoria/maquillaje',
            'parent_id' => 3,
            'orden' => 1
        ]);

        Menu::create([
            'id' => 5,
            'nombre' => 'Facial',
            'url' => '/categoria/facial',
            'parent_id' => 3,
            'orden' => 2
        ]);

        Menu::create([
            'id' => 6,
            'nombre' => 'Cabello',
            'url' => '/categoria/cabello',
            'parent_id' => 3,
            'orden' => 3
        ]);
    }
}
