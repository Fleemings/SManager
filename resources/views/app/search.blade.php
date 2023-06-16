@extends('layouts.app')

@section('content')

<x-header :breadcrumbs="[['url' => route('server.index'), 'title' => 'Back to servers'], ['title' => 'Search list']]" :page-title="'Search Results'" />

<div class="col-start-2 col-end-7 row-start-1 row-end-7 justify-center items-center">
    <div class="grid grid-cols-3 gap-8 mt-28 mx-10">
        <div>
            <table class="w-full text-sm dark:text-gray-400 text-center">
                <caption class="p-2 text-lg font-normal text-center rounded-lg border-b-2 border-b-gray-100 dark:text-white dark:bg-gray-800">
                    Users
                </caption>
                <thead class="text-xs uppercase dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            First Name
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($workers as $worker)
                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 whitespace-normal dark:text-gray-100 hover:bg-gray-600 transition-all">
                            <a href="{{ route('search.showOneWorker',['id' => $worker->id])}}">
                                {{ $worker->first_name }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex flex-col items-center mt-4">
                <!-- Help text -->
                <?php
                    $firstItem = $workers->firstItem() ?  : '0';
                    $lastItem = $workers->lastItem() ? : '0';
                    ?>
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900">{{ $firstItem}}</span> to <span class="font-semibold text-gray-900 ">{{ $lastItem}}</span> of <span class="font-semibold text-gray-900">{{ $workers->total()}}</span> Entries
                </span>
                <!-- Buttons -->
                <div class="inline-flex mt-2 xs:mt-0">
                    @if ($workers->previousPageUrl())
                    <a href="{{ $workers->previousPageUrl()}}" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-900  dark:hover:text-white">
                        Previous
                    </a>
                    @endif
                    @if ($workers->nextPageUrl())
                    <a href="{{ $workers->nextPageUrl()}}" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-900  dark:hover:text-white">
                        Next
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <div>

            <table class="w-full text-sm dark:text-gray-400 text-center">
                <caption class="p-2 text-lg font-normal text-center rounded-lg border-b-2 border-b-gray-100 dark:text-white dark:bg-gray-800">
                    Teams
                </caption>
                <thead class="text-xs uppercase dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Team Name
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 whitespace-normal dark:text-gray-100 hover:bg-gray-600 transition-all">
                            <a href="{{ route('search.showOneTeam', ['teamId' => $team->id]) }}">
                                {{ $team->team_name }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex flex-col items-center mt-4">
                <!-- Help text -->
                <?php
                    $firstItem = $teams->firstItem() ?  : '0';
                    $lastItem = $teams->lastItem() ? : '0';
                    ?>
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900">{{ $firstItem}}</span> to <span class="font-semibold text-gray-900 ">{{ $lastItem}}</span> of <span class="font-semibold text-gray-900">{{ $teams->total()}}</span> Entries
                </span>
                <!-- Buttons -->
                <div class="inline-flex mt-2 xs:mt-0">
                    @if ($teams->previousPageUrl())
                    <a href="{{ $teams->previousPageUrl()}}" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-900  dark:hover:text-white">
                        Previous
                    </a>
                    @endif
                    @if ($teams->nextPageUrl())
                    <a href="{{ $teams->nextPageUrl()}}" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-900  dark:hover:text-white">
                        Next
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <div>
            <table class="w-full text-sm dark:text-gray-400 text-center">
                <caption class="p-2 text-lg font-normal text-center rounded-lg border-b-2 border-b-gray-100 dark:text-white dark:bg-gray-800">
                    Servers
                </caption>
                <thead class="text-xs uppercase dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Server Name
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servers as $server)
                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 whitespace-normal dark:text-gray-100 hover:bg-gray-600 transition-all">
                            <a href="{{ route('search.showOneServer', ['serverId' => $server->id])}}">
                                {{ $server->server_name }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex flex-col items-center mt-4">
                <!-- Help text -->
                <?php
                    $firstItem = $servers->firstItem() ?  : '0';
                    $lastItem = $servers->lastItem() ? : '0';
                    ?>
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900">{{ $firstItem}}</span> to <span class="font-semibold text-gray-900 ">{{ $lastItem}}</span> of <span class="font-semibold text-gray-900">{{ $servers->total()}}</span> Entries
                </span>
                <!-- Buttons -->
                <div class="inline-flex mt-2 xs:mt-0">
                    @if ($servers->previousPageUrl())
                    <a href="{{ $servers->previousPageUrl()}}" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-900  dark:hover:text-white">
                        Previous
                    </a>
                    @endif
                    @if ($servers->nextPageUrl())
                    <a href="{{ $servers->nextPageUrl()}}" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-900  dark:hover:text-white">
                        Next
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
