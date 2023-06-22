@extends('layouts.app')

@section('content')
<x-header :breadcrumbs="[['url' => route('team.index'), 'title' => 'Teams'], ['title' => 'Create a team']]" :page-title="'Form'" />

<section class=" col-start-2 col-end-7 row-start-1 row-end-7 justify-center mt-28 mb-14">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16 shadow-lg">
        <h2 class="mb-4 text-xl font-bold text-gray-900">New team</h2>
        <form method="POST" action="{{ route('team.save') }}">
            @csrf

            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                        Team name
                        <input id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" type="text" name="name" placeholder="Type team name" value="{{ old('name') }}" />
                    </label>
                    @error('name')
                    <span class="text-sm text-red-600 font-semibold uppercase">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                        Description
                        <textarea type="text" name="description" row='4' id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Your description here">{{ old('description') }}</textarea>
                    </label>
                    @error('description')
                    <span class="text-sm text-red-600 font-semibold uppercase">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <input type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-cyan-900 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-cyan-700" value="Submit" />
        </form>
    </div>
</section>
@endsection
