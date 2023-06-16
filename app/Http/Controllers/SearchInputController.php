<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\Team;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchInputController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $perPage = 5;

        $workers = Worker::where('first_name', 'LIKE', "%{$search}%")
        ->paginate($perPage);

        $teams = Team::where('team_name', 'LIKE', "%{$search}%")->paginate($perPage);

        $servers = Server::where('server_name', 'LIKE', "%{$search}%")->paginate($perPage);


        return view('app.search', compact('workers', 'teams', 'servers'));
    }

    public function showOneWorker($id): View
    {
        $worker = Worker::findOrFail($id);

        return view('app.one-worker', compact('worker'));
    }


    public function showOneServer($serverId)
    {
        $server = Server::findOrFail($serverId);
        return view('app.one-server', compact('server'));
    }

    public function showOneTeam($teamId)
    {
        $team = Team::findOrFail($teamId);
        return view('app.one-team', compact('team'));
    }
}
