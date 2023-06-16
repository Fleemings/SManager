@extends('layouts.app')

@section('content')
<x-header :breadcrumbs="[['url' => route('team.index'), 'title' => 'Teams'], ['title' => 'Workers list']]" :page-title="'Workers in the team'" />

<div class="col-start-2 col-end-7 row-start-1 row-end-7 justify-center mt-28">
    <div class="flex justify-center">
        <div class="px-4 relative w-11/12">
            <div class="flex my-4 shadow-md bg-gray-900 p-2 rounded justify-end">
                <div class="relative mt-1">
                    <a href="{{ route('worker.create', ['teamId' => $team->id]) }}" class="dark:bg-cyan-800  hover:bg-cyan-700 font-normal py-2 px-4 rounded ml-4 focus:outline-none focus:ring-2 focus:ring-cyan-500 inset-y-0 right-0 flex items-center text-gray-100">Add user</a>
                </div>
            </div>
            <table class="w-full border divide-y divide-gray-200 text-center">
                <thead class="bg-gray-70">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            First Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Last Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Job Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email Address
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($workers as $worker)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-gray-900 font-medium text-sm">{{ $worker->first_name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-gray-900 font-medium text-sm">{{ $worker->last_name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-gray-900 font-medium text-sm">{{ $worker->job_title }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-gray-900 font-medium text-sm">{{ $worker->email }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col items-center">
                                <form action='{{ route('worker.destroy', [$worker->id, $team->id]) }}' method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center justify-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" fill="#fff">
                                            <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex flex-col items-center mt-4">
                <!-- Help text -->
                <?php
                    $firstItem = $workers->firstItem() ? : '0';
                    $lastItem = $workers->lastItem() ? : '0';
                ?>

                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900">{{ $firstItem }}</span> to <span class="font-semibold text-gray-900">{{ $lastItem }}</span> of <span class="font-semibold text-gray-900">{{ $workers->total() }}</span> Entries
                </span>

                <!-- Buttons -->
                <div class="inline-flex mt-2 xs:mt-0">
                    @if ($workers->previousPageUrl())
                    <a href="{{ $workers->previousPageUrl() }}" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-900 dark:hover:text-white">
                        Previous
                    </a>
                    @endif
                    @if ($workers->nextPageUrl())
                    <a href="{{ $workers->nextPageUrl() }}" class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-900 dark:hover:text-white">
                        Next
                    </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
