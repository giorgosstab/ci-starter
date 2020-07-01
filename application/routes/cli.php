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

Route::group('luthier', function(){
    Route::group('database', function(){
        Route::cli('seed', function(){
            ci()->seeder->call('DatabaseSeeder');
            echo 'DatabaseSeeder seeding successfully!';
        });
    });
});
