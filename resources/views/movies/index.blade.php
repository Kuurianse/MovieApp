@extends('app')
@section('content')

  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
    @foreach ($movies as $movie)
      <div class="bg-gray-800 p-4 rounded-lg relative group">
        <a href="{{ route('movie.show', $loop->index) }}">
          <img src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}" class="w-full rounded-md">
          <h3 class="text-lg mt-2">{{ $movie['title'] }}</h3>
          <p class="text-sm text-gray-400">{{ $movie['release_date'] }}</p>
          
          <div class="absolute top-2 right-2 space-x-2 opacity-0 group-hover:opacity-100 transition">
            <a href="{{ route('movie.edit', $loop->index) }}"><button class="bg-green-600 p-1 rounded hover:bg-green-500">✏️</button></a>
            {{-- <button class="bg-red-600 p-1 rounded hover:bg-red-500">🗑️</button> --}}
            <form id="delete-form-{{ $loop->index }}" action="{{ route('movie.destroy', $loop->index) }}"
                method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
            <a href="{{ route('movie.destroy', $loop->index) }}"
              onclick="event.preventDefault(); if (confirm('Are you sure?')) { document.getElementById('delete-form-{{ $loop->index }}').submit(); }"
              class="bg-red-600 p-1 rounded hover:bg-red-500">
              🗑️
            </a>           
          </div>
        </a>
      </div>
    @endforeach
  </div>

@endsection
{{-- 

  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">

.grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1.25rem; /* 5 in Tailwind's spacing scale */
}

@media (min-width: 640px) {
  .grid {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (min-width: 768px) {
  .grid {
    grid-template-columns: repeat(4, 1fr);
  }
}

@media (min-width: 1024px) {
  .grid {
    grid-template-columns: repeat(5, 1fr);
  }
}
--}}