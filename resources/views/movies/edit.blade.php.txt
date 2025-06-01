@extends('app')

@section('content')

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
    <h2 class="text-2xl font-bold mb-6">Edit Movie</h2>

    <form class="space-y-6" action="{{ route('movie.update', $movieId) }}" method="POST">
      @csrf
      @method('PATCH')
      <div>
        <label for="title" class="block text-lg mb-2">Title</label>
        <input type="text" id="title" name="title" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ $movie['title'] }}">
      </div>
      <div>
        <label for="title_japanese" class="block text-lg mb-2">Japanese Title</label>
        <input type="text" id="title_japanese" name="title_japanese" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ $movie['title_japanese'] }}">
      </div>
      <div>
        <label for="description" class="block text-lg mb-2">Description EN</label>
        <textarea name="description" id="description" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">{{ $movie['description'] }}</textarea>
      </div>
      <div>
        <label for="description_id" class="block text-lg mb-2">Description ID</label>
        <textarea name="description_id" id="description_id" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">{{ $movie['description_id'] }}</textarea>
      </div>
      <div>
        <label for="release_date" class="block text-lg mb-2">Release Date</label>
        <input type="date" id="release_date" name="release_date" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ $movie['release_date'] }}">
      </div>
      <div>
        <label for="cast" class="block text-lg mb-2">Cast</label>
        <input type="text" id="cast" name="cast" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ $movie['cast'] }}">
      </div>
      <div>
        <label for="genres" class="block text-lg mb-2">Genres</label>
        <input type="text" id="genres" name="genres" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ $movie['genres'] }}">
      </div>
      <div>
        <label for="image" class="block text-lg mb-2">Poster</label>
        <input type="text" id="image" name="image" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ $movie['image'] }}">
      </div>
      <div>
        <button type="submit" class="bg-blue-600 px-6 py-2 rounded hover:bg-blue-500">Save</button>
      </div>
    </form>

  </div>

@endsection