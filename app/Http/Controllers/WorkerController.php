<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\User;
use App\Models\Team;
use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of all workers.
     */
    public function index()
    {
        $getAllWorker = Worker::paginate(5);
        return view('app.worker', compact('getAllWorker'));
    }

    /**
     * Show the form for adding a worker in a team.
     */
    public function create($teamId)
    {
        $getAllWorker = Worker::paginate(5);
        $team = Team::findOrFail($teamId);
        return view('forms.form-create-worker', compact('getAllWorker', 'team'));
    }

    /**
     * Store a newly added worker in a team.
     */
    public function store(Request $request, $teamId)
    {
        $workerId = $request->input('worker_id');
        $worker = Worker::findOrFail($workerId);
        $team = Team::findOrFail($teamId);
        $team->workers()->syncWithoutDetaching($worker->id);

        return redirect()->route('team.show', ['id' => $teamId])->withInput();
    }

    /**
     * Display all workers with teams and server.
     */
    public function show($id)
    {
        $worker = Worker::findOrFail($id);
        $teams = $worker->teams;
        $servers = $worker->servers;

        return view('app.worker-server-team', compact('worker', 'teams', 'servers'));

    }

    /**
    * Display workers in a team.
    */
    public function showTeam($id)
    {
        $team = Team::findOrFail($id);
        $worker = $team->workers;
        return view('app.team-worker', compact('team', 'worker'));

    }

    /**
     * Remove the specified worker from a team.
     */
    public function destroy($workerId, $teamId)
    {
        $worker = Worker::findOrFail($workerId);
        $worker->teams()->detach($teamId);
        return redirect()->route('worker.showTeam', ['id' => $workerId->id, 'id' => $teamId->id])->withInput();
    }

}
