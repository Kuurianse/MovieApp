@extends('app')

@section('content')

  <div class="flex flex-col md:flex-row items-start">

    <div class="w-full md:w-1/3">
      <img src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}" class="rounded-lg shadow-lg">
    </div>

    <div class="md:ml-10 mt-5 md:mt-0 w-full md:w-2/3">
      <h2 class="text-4xl font-bold mb-1">{{ $movie['title'] }}</h2>
      <h2 class="text-gray-400 text-lg font-bold mb-4">{{ $movie['title_japanese'] }}</h2>
      <p class="text-gray-400 text-lg mb-4">
        Release Date: <span class="text-white">{{ $movie['release_date'] }}</span>
      </p>
      <h3 class="text-xl font-semibold mb-2">Description (English)</h3>
      <p class="text-lg mb-4">{{ $movie['description'] }}</p>
      
      <h3 class="text-xl font-semibold mb-2">Deskripsi (Bahasa Indonesia)</h3>
      <p class="text-lg mb-4">{{ $movie['description_id'] }}</p>
      
        
      <h3 class="text-xl font-semibold mb-2">Voice Actors (Seiyuu)</h3>
      <p class="text-gray-400 mb-4">
        {{ implode(', ', $movie['cast']) }}
      </p>

      <h3 class="text-xl font-semibold mb-2">Genres</h3>
      <p class="text-gray-400 mb-4">
        {{ implode(', ', $movie['genres']) }}
      </p>
      
      <div class="flex space-x-4 mt-5">
        <a href="{{ route('movie.edit', $movieId) }}"><button class="bg-green-600 p-1 rounded hover:bg-green-500">✏️</button></a> 
        {{-- <button class="bg-red-600 p-1 rounded hover:bg-red-500">🗑️</button> --}}
        <form id="delete-form-{{ $movieId }}" action="{{ route('movie.destroy', $movieId) }}"
            method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        <a href="{{ route('movie.destroy', $movieId) }}"
          onclick="event.preventDefault(); if (confirm('Are you sure?')) { document.getElementById('delete-form-{{ $movieId }}').submit(); }"
          class="bg-red-600 p-1 rounded hover:bg-red-500">
          🗑️
      </a>
      </div>

    </div>
  </div>

@endsection

{{-- 

  <div class="flex flex-col md:flex-row items-start">

  .flex {
    display: flex;
  }

  .flex-col {
    flex-direction: column;
  }

  .md\:flex-row {
    @media (min-width: 768px) {
      flex-direction: row;
    }
  }

  .items-start {
    align-items: flex-start;
  }

--}}