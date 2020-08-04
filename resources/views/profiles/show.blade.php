@extends('layouts.app')

@section('content')

<header class="mb-6 relative">
    <div class="relative">
        <img
        src="https://pbs.twimg.com/profile_banners/3291299176/1588627303/1080x360"
        alt=""
        class="mb-2 rounded-lg"
        >

        <img
            src="{{ $user->avatar }}"
            alt=""
            class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
            width="150"
            style="left: 50%;"
        >
    </div>

    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="font-bold text-2xl mb-0">{{ $user->name }} </h2>
            <p class="text-sm ">Joined {{ $user->created_at->diffForHumans() }}</p>
        </div>

        <div class="flex">

                <a href="" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">Edit Profile</a>

                <!-- passes the $user variable to the blade component -->
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <p class="text-sm">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur excepturi possimus quis ea quia eaque, doloremque consequuntur assumenda fuga perferendis repellat neque laboriosam nobis, officiis natus eligendi impedit in omnis?
        </p>


    </header>

    @include ('_timeline', [
        'tweets' => $user->tweets
    ])

@endsection
