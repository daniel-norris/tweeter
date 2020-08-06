<x-app>
    <div>
        @foreach ($users as $user)
            <img src="{{ $user->avatar }}"
                alt="{{ $user->username }}'s avatar"
                width="60"
                style="height: 60px; object-fit: cover; "

            >
        @endforeach
    </div>
</x-app>