@extends('layouts.app')

@section('content')
<x-header :breadcrumbs="[['url' => route('worker.index'), 'title' => 'Users'], ['title' => 'User list']]" :page-title="'Users to add in the team'" />

<div class="col-start-2 col-end-7 row-start-1 row-end-7 justify-center mt-28">
    <div class="flex justify-center">
        <div class="w-11/12 px-4 relative overflow-x-auto">
            <table class="w-11/12 border divide-y divide-gray-200 text-center">
                <thead class="bg-gray-70">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            First name
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Last name
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($workers as $worker)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50 text-sm">
                            {{ $worker->first_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50 text-sm">
                            {{ $worker->last_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50 text-sm">
                            {{ $worker->job_title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50 text-sm">
                            {{ $worker->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('worker.store', ['teamId' => $team->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="worker_id" value="{{ $worker->id }}">
                                <button type="submit" class="dark:bg-cyan-800  hover:bg-cyan-700 font-normal py-2 px-4 rounded ml-4 focus:outline-none focus:ring-2 focus:ring-cyan-600 text-white flex items-center">Add
                                    to
                                    team</button>
                            </form>

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
    </div>
</div>
@endsection
