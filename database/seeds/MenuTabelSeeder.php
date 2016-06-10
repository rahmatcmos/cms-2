<?php

use Illuminate\Database\Seeder;
use ILLuminate\Database\Eloquent\Model;
use Beyondplus\Models\Bp_menu;

class MenuTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bp_menu::truncate();
     	Bp_menu::create([
     		'menu_name' => 'Home',
     		'parent_id'		=>	'0',
     		'created_at'    => '2016-06-3 00:36:29'
     		]);
    }
}
