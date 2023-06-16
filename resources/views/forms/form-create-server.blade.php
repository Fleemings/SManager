@extends('layouts.app')

@section('content')
<x-header :breadcrumbs="[['url' => route('server.index'), 'title' => 'Server'], ['title' => 'Create a server']]" :page-title="'Form'" />

<section class="col-start-2 col-end-7 row-start-1 row-end-7 justify-center mt-28">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16 shadow-lg">
        <h2 class="mb-4 text-xl font-bold text-gray-900">New server</h2>
        <form method="POST" action="{{ route('server.store') }}">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="server_name" class="block mb-2 text-sm font-medium text-gray-900">
                        Server name
                        <input id="server_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" type="text" name="server_name" placeholder="Type server name" value="{{ old('server_name') }}" />
                    </label>
                    @error('server_name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                        Description
                        <textarea type="text" name="description" row='4' id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Your description here">{{ old('description') }}</textarea>
                    </label>
                    @error('description')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="ip" class="block mb-2 text-sm font-medium text-gray-900">
                        IP Address
                        <input id="ip" name="ip" class="block h-9 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 " type="text" placeholder="127.0.0.1:8000" value="{{ old('ip') }}" />
                    </label>
                    @error('ip')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <input type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-cyan-900 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-cyan-700" value="Submit" />
        </form>
    </div>
</section>
@endsection
