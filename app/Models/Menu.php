<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'url', 'parent_id', 'orden'];

    public function submenus()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('orden');
    }
}
