<?php

namespace Routes;

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

class Api
{
    static function register()
    {
//        Route::resource('/tasks',TaskController::class);
        Route::get('tasks',[TaskController::class,'index']);
        Route::post('tasks',[TaskController::class,'store'])->name('tasks.store');
        Route::get('tasks/{task}',[TaskController::class,'show'])->name('tasks.show');
        Route::post('tasks/update/{task}',[TaskController::class, 'update'])->name('tasks.update');
        Route::delete('tasks/{task}',[TaskController::class, 'destroy'])->name('tasks.destroy');

    }
}
