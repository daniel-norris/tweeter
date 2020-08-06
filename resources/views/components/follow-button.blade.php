@unless (current_user()->is($user))

    <form method="POST" action="{{ route('follow', $user->username) }}">
        @csrf
        <button
            type="submit"
            class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs ml-2"
        >
            {{ current_user()->following($user) ? "Unfollow Me" : "Follow Me" }}
        </button>
    </form>

@endunless