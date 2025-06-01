<x-app>

    <x-slot name="sidebar">
        <x-partials.sidebar :menus="[
            ['name' => 'Dashboard', 'link' => '/Dashboard'],
            ['name' => 'Movies', 'link' => '/Movies'],
            ['name' => 'Actors', 'link' => '/Actors'],
            ['name' => 'Directors', 'link' => '/Directors'],
            ['name' => 'Genres', 'link' => '/Genres'],
            ['name' => 'Settings', 'link' => '/Settings'],
            ['name' => 'Logout', 'link' => '/Logout'],
        ]"></x-partials.sidebar>
        {{-- bisa juga dikirim dari router atau controller --}}
        {{-- <x-partials.sidebar :menus="$menus"></x-partials.sidebar> --}}
    </x-slot>

    <x-slot name="main">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
            @foreach ($movies as $movie)
                <x-movie.card :index="$loop->index" :image="$movie['image']" :title="$movie['title']" :releasedate="$movie['release_date']">
                </x-movie.card>
            @endforeach
        </div>
    </x-slot>

</x-app>