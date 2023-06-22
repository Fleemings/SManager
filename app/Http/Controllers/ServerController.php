<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreServerRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ServerController extends Controller
{
    /**
     * Display a listing of all servers.
     */
    public function index(): View
    {
        $servers = Server::paginate(5);
        return view('app.server', compact('servers'));
    }

    /**
     * Show the form for creating a new server.
     */
    public function create(): View
    {
        return view('forms.new_server');
    }

    /**
     * Store a newly created server in storage.
     */
    public function store(StoreServerRequest $request): RedirectResponse
    {
        $serverValidated = $request->validated();

        Server::create($serverValidated);

        toast('New server successfully created', 'success');
        return redirect()->route('server.index');
    }


    /**
     * Display the teams inside the server.
     */
    public function show(Server $server, $serverId): View
    {
        $server = Server::findOrFail($serverId);
        $teams = $server->teams()->paginate(5);

        return view('app.server_team', compact('server', 'teams'));
    }

    /**
     * Show the form for editing the server.
     */
    public function edit($id): View
    {
        $server = Server::findOrFail($id);
        return view('forms.edit_server', compact('server'));
    }

    /**
     * Update the server.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $oneServerId = Server::findOrFail($id);

        $oneServerValidation = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ip' => 'required'
        ]);

        $oneServerId->update($oneServerValidation);
        toast('Server successfully updated', 'success');
        return redirect()->route('server.index');
    }

    /**
     * Remove the specified server from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Server::findOrFail($id)->delete();
        toast('Server successfully removed', 'success');
        return redirect()->route('server.index');
    }
}
