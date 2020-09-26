<?php

/**
 * CLI Routes
 *
 * This routes only will be available under a CLI environment
 */

// To enable Luthier-CI built-in cli commands
// uncomment the followings lines:

Luthier\Cli::maker();
Luthier\Cli::migrations();

Route::cli('make:controller/{(.+):name}', 'Luthier/CliController@makeContoller');
Route::cli('make:model/{(.+):name}', 'Luthier/CliController@makeModel');
Route::cli('make:helper/{(.+):name}', 'Luthier/CliController@makeHelper');
Route::cli('make:library/{(.+):name}', 'Luthier/CliController@makeLibrary');
Route::cli('make:middleware/{(.+):name}', 'Luthier/CliController@makeMiddleware');
Route::cli('make:migration/{name}/{((sequential|timestamp)):type?}', 'Luthier/CliController@makeMigration');
Route::cli('make:seeder/{(.+):name}', 'Luthier/CliController@makeSeeder');

Route::cli('migrate/{version?}/{seed?}', 'Luthier/CliController@migrations');
Route::cli('db:seed', 'Luthier/CliController@seeds');

