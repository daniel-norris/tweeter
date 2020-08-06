<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf

        <textarea
            name="body"
            class="w-full"
            placeholder="What do you want to tweet?"
            required
            autofocus
        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="your avatar"
                class="rounded-full mr-2"
                width="50"
                style="height: 50px; object-fit: cover;"
            >

            <x-publish-button>
            </x-publish-button>

        </footer>

    </form>

    @error('body')

        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>

    @enderror

</div>