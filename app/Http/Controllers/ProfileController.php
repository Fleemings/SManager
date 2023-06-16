<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $worker = $user->worker;
        return view('profile.edit', [
            'user' => $user,
            'worker' => $worker
        ]);
    }

    /**
     * Update the user's profile information with worker table.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user()->fill($request->validated());
        $worker = $user->worker;

        $worker->email = $request->input('email');
        $worker->first_name = $request->input('first_name');
        $worker->last_name = $request->input('last_name');
        $worker->job_title = $request->input('job_title');

        $worker->save();

        $user->email = $worker->email;
        $user->name = $worker->first_name;

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $worker = Worker::where('user_id', $user->id)->first();
        if($worker) {
            $worker->delete();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
