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

    <form class="space-y-6" action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
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
        <label for="title_japanese" class="block text-lg mb-2">Japanese Title (Optional)</label>
        <input type="text" id="title_japanese" name="title_japanese" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('title_japanese') border-red-500 @enderror" value="{{ old('title_japanese') }}" onfocus="this.classList.remove('border-red-500')">
        @error('title_japanese')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="description" class="block text-lg mb-2">Description EN</label>
        <textarea name="description" id="description" rows="4" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('description') border-red-500 @enderror" onfocus="this.classList.remove('border-red-500')">{{ old('description') }}</textarea>
        @error('description')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="description_id" class="block text-lg mb-2">Description ID (Optional)</label>
        <textarea name="description_id" id="description_id" rows="4" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('description_id') border-red-500 @enderror" onfocus="this.classList.remove('border-red-500')">{{ old('description_id') }}</textarea>
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
        <label for="categories" class="block text-lg mb-2">Categories (Optional)</label>
        <select name="categories[]" id="categories" multiple class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 h-32 @error('categories.*') border-red-500 @enderror">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (collect(old('categories'))->contains($category->id)) ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('categories.*')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label for="genres" class="block text-lg mb-2">Genres (Optional)</label>
        <select name="genres[]" id="genres" multiple class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 h-32 @error('genres.*') border-red-500 @enderror">
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ (collect(old('genres'))->contains($genre->id)) ? 'selected' : '' }}>{{ $genre->name }}</option>
            @endforeach
        </select>
        @error('genres.*')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label for="cast_text" class="block text-lg mb-2">Cast Members (Optional, comma-separated)</label>
        <input type="text" id="cast_text" name="cast_text" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('cast_text') border-red-500 @enderror" value="{{ old('cast_text') }}" onfocus="this.classList.remove('border-red-500')">
        @error('cast_text')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      
      <div>
        <label for="image" class="block text-lg mb-2">Poster Image (Optional)</label>
        <input type="file" id="image" name="image" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('image') border-red-500 @enderror">
        @error('image')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="image_url" class="block text-lg mb-2">Or Poster Image URL (Optional)</label>
        <input type="text" id="image_url" name="image_url" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('image_url') border-red-500 @enderror" value="{{ old('image_url') }}" onfocus="this.classList.remove('border-red-500')">
        @error('image_url')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <button type="submit" class="bg-blue-600 px-6 py-2 rounded hover:bg-blue-500">Save Movie</button>
      </div>
    </form>

  </div>

@endsection