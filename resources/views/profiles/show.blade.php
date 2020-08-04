@extends('layouts.app')

@section('content')

    <header class="mb-6 relative">
        <img
            src="https://pbs.twimg.com/profile_banners/3291299176/1588627303/1080x360"
            alt=""
            class="mb-2 rounded-lg"
        >

        <div class="flex justify-between items-center mb-4 ">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }} </h2>
                <p class="text-sm ">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">

                <a href="" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">Edit Profile</a>

                <form method="POST" action="/profiles/{{ $user->name }}/follow">
                    @csrf
                    <button
                        type="submit"
                        class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs"
                    >
                        {{ auth()->user()->following($user) ? "Unfollow Me" : "Follow Me" }}
                    </button>
                </form>
            </div>
        </div>

        <p class="text-sm">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur excepturi possimus quis ea quia eaque, doloremque consequuntur assumenda fuga perferendis repellat neque laboriosam nobis, officiis natus eligendi impedit in omnis?
        </p>

        <img
            src="{{ $user->avatar }}"
            alt=""
            class="rounded-full mr-2 absolute"
            style="width: 150px; left: calc(50% - 75px); top: 138px;"
        >

    </header>

    @include ('_timeline', [
        'tweets' => $user->tweets
    ])

@endsection
