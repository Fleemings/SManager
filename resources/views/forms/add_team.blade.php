@extends('layouts.app')

@section('content')
<x-header :breadcrumbs="[['url' => route('server.index'), 'title' => 'Servers'], ['title' => 'Team list']]" :page-title="'Teams to add in the server'" />

<div class="col-start-2 col-end-7 row-start-1 row-end-7 justify-center mt-28">
    <div class="flex justify-center">
        <div class="w-11/12 px-4 relative overflow-x-auto">
            <table class="w-11/12 border divide-y divide-gray-200 text-center">
                <thead class="bg-gray-70">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Team Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created at
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($teams as $team)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50 text-sm">
                            {{ $team->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-normal hover:bg-gray-50 text-sm">
                            {{ $team->description }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50 text-sm">
                            {{ $team->created_at }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('team.saveTeam', ['serverId' => $server->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="team_id" value="{{ $team->id }}">
                                <button type="submit" class="dark:bg-cyan-800  hover:bg-cyan-700 font-normal py-2 px-4 rounded ml-4 text-white focus:outline-none focus:ring-2 ffocus:ring-cyan-500 flex items-center justify-center">Add
                                    to team</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex flex-col items-center mt-4">
                <!-- Help text -->
                <?php
                    $firstItem = $teams->firstItem() ?  : '0';
                    $lastItem = $teams->lastItem() ?  : '0';
                ?>
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900">{{ $firstItem}}</span> to <span class="font-semibold text-gray-900 ">{{ $lastItem}}</span> of <span class="font-semibold text-gray-900">{{ $teams->total()}}</span> Entries
                </span>
                <!-- Buttons -->
                <div class="inline-flex mt-2 xs:mt-0">
                    @if ($teams->previousPageUrl())
                    <a href="{{ $teams->previousPageUrl()}}" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900  dark:hover:text-white">
                        Previous
                    </a>
                    @endif
                    @if ($teams->nextPageUrl())
                    <a href="{{ $teams->nextPageUrl()}}" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900  dark:hover:text-white">
                        Next
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
