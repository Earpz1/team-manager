<?php

use App\Models\Teams;
use App\Models\Players;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//This route lists all the teams
Route::get('/teams', function () {
    $teams = Teams::all();
    return response()->json($teams);
});

//This route lists all the players
Route::get('/players', function () {
    $players = Players::all();
    return response()->json($players);
});

//This route finds a player by id
Route::get('/player/{id}', function ($id) {
    $player = Players::find($id);
    return response()->json($player);
});

//This route lists all the players that do not have a team
Route::get('/players/no-team', function () {
    $players = Players::where('player_team', null)->get();
    return response()->json($players);
});

//This route finds a team by id and lists all the players on that team
Route::get('/team/{id}', function ($id) {
    $team = Teams::find($id)->players;
    return response()->json($team);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
