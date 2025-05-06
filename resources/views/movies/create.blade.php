@extends('app')

@section('content')


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
  <h2 class="text-2xl font-bold mb-6">Add Movie</h2>
  {{-- display error --}}
  {{-- @if ($errors->any())
    <div class="bg-red-500 text-white p-4 rounded mb-4">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif --}}

    <form class="space-y-6" action="{{ route('movie.store') }}" method="POST">
      @csrf
      <div>
        <label for="title" class="block text-lg mb-2">Title</label>
        <input type="text" id="title" name="title" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('title') border-red-500 @enderror" 
        value="{{ old('title') }}"
        onfocus="this.classList.remove('border-red-500')">
        @error('title')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="title_japanese" class="block text-lg mb-2">Japanese Title</label>
        <input type="text" id="title_japanese" name="title_japanese" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('title_japanese') border-red-500 @enderror" value="{{ old('title_japanese') }}" onfocus="this.classList.remove('border-red-500')">
        @error('title_japanese')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="description" class="block text-lg mb-2">Description EN</label>
        <textarea name="description" id="description" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('description') border-red-500 @enderror" onfocus="this.classList.remove('border-red-500')">{{ old('description') }}</textarea>
        @error('description')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="description_id" class="block text-lg mb-2">Description ID</label>
        <textarea name="description_id" id="description_id" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('description_id') border-red-500 @enderror" onfocus="this.classList.remove('border-red-500')">{{ old('description_id') }}</textarea>
        @error('description_id')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="release_date" class="block text-lg mb-2">Release Date</label>
        <input type="date" id="release_date" name="release_date" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('release_date') border-red-500 @enderror" value="{{ old('release_date') }}" onfocus="this.classList.remove('border-red-500')">
        @error('release_date')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="cast" class="block text-lg mb-2">Cast</label>
        <input type="text" id="cast" name="cast" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('cast') border-red-500 @enderror" value="{{ old('cast') }}" onfocus="this.classList.remove('border-red-500')">
        @error('cast')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="genres" class="block text-lg mb-2">Genres</label>
        <input type="text" id="genres" name="genres" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('genres') border-red-500 @enderror" value="{{ old('genres') }}" onfocus="this.classList.remove('border-red-500')">
        @error('genres')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div> 
        @enderror
      </div>
      <div>
        <label for="image" class="block text-lg mb-2">Poster</label>
        <input type="text" id="image" name="image" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('image') border-red-500 @enderror" value="{{ old('image') }}" onfocus="this.classList.remove('border-red-500')">
        @error('image')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <button type="submit" class="bg-blue-600 px-6 py-2 rounded hover:bg-blue-500">Save</button>
      </div>
    </form>

  </div>

@endsection