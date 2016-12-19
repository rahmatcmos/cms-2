<?php

//use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// });

// Artisan::command('generate:model {name : The name of model generate}', function(){

// 	exec('touch app/'. $this->argument('name'). '.php');

// })->describe('Generate a special model.');


// Artisan::command('generate:model {name : The name of model generate}', function(){

// 	$model = $this->argument('name');

// 	File::put("app/{$model}.php", "class {}");

// })->describe('Generate a special model.');


Artisan::command('generate:model {name : The name of model generate}', function(){

	$model = $this->argument('name');

	File::put("app/{$model}.php", "class {}");

})->describe('Generate a special model.');
