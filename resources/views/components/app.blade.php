<x-master>
    <section class="px-8">
        <main class="container mx-auto">

            <!-- flexing only for large screens -->
            <div class="lg:flex lg:justify-between">

                <div class="lg:w-1/6">
                    @include ('_sidebar-links')
                </div>

                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                    {{ $slot }}
                </div>

                <div class="lg:w-1/6" style="height: 100%">
                    @include ('_friends-list')
                </div>

            </div>

        </main>
    </section>
</x-master>