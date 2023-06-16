@extends('layouts.app')

@section('content')
<x-header :breadcrumbs="[['url' => route('server.index'), 'title' => 'Servers'], ['title' => 'Selected server details']]" :page-title="'Selected server details'" />

<div class="col-start-2 col-end-7 row-start-1 row-end-7 justify-center mt-28">
    <div class="grid gap-4 m-4 justify-center" x-data="{ showForm: false }">
        <div class="flex justify-center">
            <div class=" px-4 relative overflow-x-auto">
                <div class="flex my-4 shadow-md bg-gray-900 p-2 rounded justify-end">
                    <div class="relative my-1 ">
                        <a href='{{ route('server.create') }}' class="dark:bg-cyan-800 hover:bg-cyan-700 focus:ring-2 focus:ring-cyan-500 text-gray-100 font-normal py-2 px-4 rounded ml-4 my-1 focus:outline-none  ">New server</a>
                    </div>
                </div>
                <table class="min-w-full border divide-y divide-gray-200 text-center">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Server Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                IP Address
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50">
                                {{ $server->server_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-normal hover:bg-gray-50">
                                {{ $server->description }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap hover:bg-gray-50">
                                {{ $server->ip }}
                            </td>
                            <td class="flex px-6 py-4 justify-between text-sm">
                                <a href="{{ route('server.edit', $server->id) }}" class="focus:outline-none text-white dark:bg-cyan-800 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-600 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" fill="#fff">
                                        <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                    </svg>
                                </a>
                                <form action='{{ route('server.destroy', $server->id) }}' method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" fill="#fff">
                                            <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
