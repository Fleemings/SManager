<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Models\Server;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class TeamController extends Controller
{
    /**
     * Display a listing of all teams.
     */
    public function index(): View
    {
        $teams = Team::paginate(5);

        return view('app.teams', compact('teams'));
    }

    /**
     * Show the form for creating a new team inside a server.
     */
    public function create($serverId): View
    {
        $server = Server::findOrFail($serverId);
        return view('forms.new_team_server', compact('server'));

    }

    /**
     * Show form for creating a new team without a server
     */

    public function add(): View
    {
        return view('forms.new_team');
    }

    /**
     * Add a team from an existent list team
    */

    public function insertTeam($serverId): View
    {
        $teams = Team::paginate(5);
        $server = Server::findOrFail($serverId);
        return view('forms.add_team', compact('teams', 'server'));

    }

    /**
    * store a team from an existent list team
    */

    public function saveTeam(Request $request, $serverId)
    {
        $teamId = $request->input('team_id');
        $team = Team::findOrFail($teamId);

        $server = Server::findOrFail($serverId);

        if($server->teams()->where('team_id', $teamId)->exists()) {
            toast('Team already exist in the server', 'warning');
        } else {
            $server->teams()->syncWithoutDetaching($team->id);
            toast('Team successfully added in the server', 'success');
        }

        return redirect()->route('server.show', ['id' => $serverId])->withInput();
    }


    /**
    * Store a newly created team inside a server.
    */
    public function store(Request $request, $serverId)
    {
        $teamValidated = $request->validate([
            'name' => 'required|unique:teams,name',
            'description' => 'required'
        ]);

        $team = Team::create($teamValidated);

        $server = Server::findOrFail($serverId);

        $server->teams()->attach($team->id);

        toast('Team successfully added in the server', 'success');
        return redirect()->route('server.show', ['id' => $serverId])->withInput();
    }

    /**
    * Store a newly created team without a server.
    */

    public function save(StoreTeamRequest $request): RedirectResponse
    {
        $teamValidated = $request->validated();
        Team::create($teamValidated);
        toast('Team successfully created', 'success');
        return redirect()->route('team.index');
    }



    /**
     * Display the users inside one team.
     */
    public function show(Team $team, $id): View
    {
        $team = Team::findOrFail($id);
        $workers = $team->workers()->paginate(5);
        return view('app.team_worker', compact('team', 'workers'));
    }



    /**
         * Show the form for editing team.
         */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('forms.edit_team', compact('team'));
    }

    /**
     * Update the specified team in storage.
     */
    public function update(Request $request, $id)
    {
        $oneTeamId = Team::findOrFail($id);
        $oneTeamValidation = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $oneTeamId->update($oneTeamValidation);
        toast('Team successfully updated', 'success');
        return redirect()->route('team.index');
    }

    /**
     * Remove the specified team from storage.
     */
    public function destroy($id)
    {
        Team::findOrFail($id)->delete();
        toast('Team successfully deleted', 'success');
        return redirect()->route('team.index');
    }
}
