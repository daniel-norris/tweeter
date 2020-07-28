<div class="flex p-4 border-b border-b-grey-400">

    <div class="mr-2 flex-shrink-0">
        <img
            src="https://i.pravatar.cc/50"
            alt=""
            class="rounded-full mr-2"
        >
    </div>

    <div>
        <h5 class="font-bold">{{ $tweet->user->name }}</h5>

        <p class="text-sm py-4">
           {{ $tweet->body }}
        <p>
    </div>

</div>