@extends('layouts.app')

@section('content')
<x-header :breadcrumbs="[['url' => route('worker.index'), 'title' => 'User'], ['title' => 'List']]" :page-title="'Selected user details'" />

<div class="col-start-2 col-end-7 row-start-1 row-end-7 justify-center mt-28">
    <div class="flex justify-center">
        <div class="px-4 relative overflow-x-auto">
            <div class="flex items-center my-4 shadow-md bg-gray-900 p-2 justify-center">
                <h1 class="text-white">User</h1>
            </div>
            <table class="border divide-y divide-gray-200">
                <thead class="bg-gray-70">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            First Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Last Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50">
                            <a href="{{ route('worker.show', ['id' => $worker->id]) }}">
                                {{ $worker->first_name }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50">
                            {{ $worker->last_name }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50">
                            {{ $worker->job_title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50">
                            {{ $worker->email }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
