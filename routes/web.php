<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\SearchInputController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    // All Servers

    Route::get('/server', [ServerController::class, 'index'])->name('server.index');
    Route::get('/server/create', [ServerController::class, 'create'])->name('server.create');
    Route::post('/server/store', [ServerController::class, 'store'])->name('server.store');
    Route::get('/server/edit/{id}', [ServerController::class, 'edit'])->name('server.edit');
    Route::patch('/server/update/{id}', [ServerController::class, 'update'])->name('server.update');
    Route::delete('/server/destroy/{id}', [ServerController::class, 'destroy'])->name('server.destroy');

    // show server detailed info in the with teams related

    Route::get('/server/{id}/teams', [ServerController::class, 'show'])->name('server.show');

    // All Teams

    Route::get('/team', [TeamController::class, 'index'])->name('team.index');

    // Create a team inside a server
    Route::get('/team/create/{serverId}', [TeamController::class, 'create'])->name('team.create');
    Route::post('/team/store/{serverId}', [TeamController::class, 'store'])->name('team.store');

    // Create team without a server

    Route::get('/team/add', [TeamController::class, 'add'])->name('team.add');
    Route::post('/team/save', [TeamController::class, 'save'])->name('team.save');

    Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
    Route::patch('/team/update/{id}', [TeamController::class, 'update'])->name('team.update');

    // Show users related to teams

    Route::get('/team/{id}/worker', [TeamController::class, 'show'])->name('team.show');
    Route::delete('/team/destroy/{id}', [TeamController::class, 'destroy'])->name('team.destroy');

    // Teams with Workers

    Route::get('/worker/{id}', [WorkerController::class, 'show'])->name('worker.show');
    Route::get('/worker/{id}/team', [WorkerController::class, 'showTeam'])->name('worker.showTeam');

    // Add Team into the server from an existig list

    Route::get('/server/teams/{serverId}', [TeamController::class, 'insertTeam'])->name('team.insertTeam');
    Route::post('/server/teams/{serverId}', [TeamController::class, 'saveTeam'])->name('team.saveTeam');

    // Search input

    Route::get('/search', [SearchInputController::class, 'index'])->name('search.index');
    Route::get('/search/worker/{id}', [SearchInputController::class, 'showOneWorker'])->name('search.showOneWorker');
    Route::get('/search/server/{serverId}', [SearchInputController::class, 'showOneServer'])->name('search.showOneServer');
    Route::get('/search/team/{teamId}', [SearchInputController::class, 'showOneTeam'])->name('search.showOneTeam');

    // All Workers
    Route::get('/worker', [WorkerController::class, 'index'])->name('worker.index');
    Route::get('/worker/create/{teamId}', [WorkerController::class, 'create'])->name('worker.create');
    Route::post('/worker/store/{teamId}', [WorkerController::class, 'store'])->name('worker.store');
    Route::delete('/worker/destroy/{workerId}/{teamId}', [WorkerController::class, 'destroy'])->name('worker.destroy');
});

// User Profile

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
