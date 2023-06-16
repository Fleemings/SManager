@extends('layouts.app')

@section('content')

<x-header :breadcrumbs="[['url' => route('server.index'), 'title' => 'Back to servers'], ['title' => 'Profile']]" :page-title="'Edit profile'" />

<div class="col-start-2 col-end-7 row-start-1 row-end-7 justify-center mt-28">
    <div class="w-4/5 mx-auto sm:px-6 lg:px-8 space-y-6 mb-4">
        <div class="p-4 sm:p-8 dark:bg-gray-800 shadow rounded-lg">
            <div>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div>
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection
