<div>
  <h1 class="font-bold text-xl mb-4">Menu</h1>
  <ul class="space-y-4">
    @foreach ($menus as $menu) 
    <li><a href="{{ $menu['link'] }}" class="text-white hover:text-gray-300">{{ $menu['name'] }}</a></li>
    @endforeach
    {{-- <li><a href="#" class="text-white hover:text-gray-300">Dashboard</a></li>
    <li><a href="#" class="text-white hover:text-gray-300">Movies</a></li>
    <li><a href="#" class="text-white hover:text-gray-300">Actors</a></li>
    <li><a href="#" class="text-white hover:text-gray-300">Directors</a></li>
    <li><a href="#" class="text-white hover:text-gray-300">Genres</a></li>
    <li><a href="#" class="text-white hover:text-gray-300">Settings</a></li>
    <li><a href="#" class="text-white hover:text-gray-300">Logout</a></li> --}}
</ul>
</div>