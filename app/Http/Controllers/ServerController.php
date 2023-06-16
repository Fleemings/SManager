<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreServerRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServerController extends Controller
{
    /**
     * Display a listing of all servers.
     */
    public function index(): View
    {
        $getAllServer = Server::paginate(5);
        return view('app.server', compact('getAllServer'));
    }

    /**
     * Show the form for creating a new server.
     */
    public function create(): View
    {
        return view('forms.form-create-server');
    }

    /**
     * Store a newly created server in storage.
     */
    public function store(StoreServerRequest $request): RedirectResponse
    {
        $serverValidated = $request->validated();

        Server::create($serverValidated);

        return redirect()->route('server.index');
    }


    /**
     * Display the teams inside the server.
     */
    public function show(Server $server, $serverId): View
    {
        $server = Server::findOrFail($serverId);
        $teams = $server->teams()->paginate(5);

        return view('app.server-team', compact('server', 'teams'));
    }

    /**
     * Show the form for editing the server.
     */
    public function edit($id): View
    {
        $server = Server::findOrFail($id);
        return view('forms.form-edit-server', compact('server'));
    }

    /**
     * Update the server.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $oneServerId = Server::findOrFail($id);

        $oneServerValidation = $request->validate([
            'server_name' => 'required',
            'description' => 'required',
            'ip' => 'required'
        ]);

        $oneServerId->update($oneServerValidation);

        return redirect()->route('server.index');
    }

    /**
     * Remove the specified server from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Server::findOrFail($id)->delete();

        return redirect()->route('server.index');
    }
}
