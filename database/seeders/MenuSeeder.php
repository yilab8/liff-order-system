<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    
public function run()
{
    Menu::create(['name' => 'Burger', 'price' => 5.99, 'description' => 'Delicious burger']);
    Menu::create(['name' => 'Pizza', 'price' => 8.99, 'description' => 'Cheesy pizza']);
}
}
