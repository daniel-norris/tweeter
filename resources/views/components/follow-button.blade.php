@unless (auth()->user()->is($user))

    <form method="POST" action="/profiles/{{ $user->name }}/follow">
        @csrf
        <button
            type="submit"
            class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs ml-2"
        >
            {{ auth()->user()->following($user) ? "Unfollow Me" : "Follow Me" }}
        </button>
    </form>

@endunless