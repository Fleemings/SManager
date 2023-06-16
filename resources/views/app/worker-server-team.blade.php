@extends('layouts.app')

@section('content')
<x-header :breadcrumbs="[['url' => route('worker.index'), 'title' => 'Users'], ['title' => 'List']]" :page-title="'All details'" />

<div class="col-start-2 col-end-7 row-start-1 row-end-7 justify-center mt-28">
    <div class="flex justify-center">
        <div class="w-11/12 px-4 relative overflow-x-auto">
            <table class=" w-11/12 border divide-y divide-gray-200 text-center">
                <thead class="bg-gray-70">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            First Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Teams
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Servers
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50 text-sm">
                            {{ $worker->first_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50 text-sm">
                            {{ $worker->job_title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50 text-sm">
                            @foreach ($teams as $team)
                            {{ $team->team_name }}<br>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50 text-sm">
                            @foreach ($servers as $server)
                            {{ $server->server_name }}<br>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
