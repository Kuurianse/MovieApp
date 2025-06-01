@extends('app')

@section('content')

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
    <h2 class="text-2xl font-bold mb-6">Edit Movie</h2>

    <form class="space-y-6" action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div>
        <label for="title" class="block text-lg mb-2">Title</label>
        <input type="text" id="title" name="title" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('title') border-red-500 @enderror"
        value="{{ old('title', $movie->title) }}"
        onfocus="this.classList.remove('border-red-500')">
        @error('title')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="title_japanese" class="block text-lg mb-2">Japanese Title (Optional)</label>
        <input type="text" id="title_japanese" name="title_japanese" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('title_japanese') border-red-500 @enderror" value="{{ old('title_japanese', $movie->title_japanese) }}" onfocus="this.classList.remove('border-red-500')">
        @error('title_japanese')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="description" class="block text-lg mb-2">Description EN</label>
        <textarea name="description" id="description" rows="4" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('description') border-red-500 @enderror" onfocus="this.classList.remove('border-red-500')">{{ old('description', $movie->description) }}</textarea>
        @error('description')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="description_id" class="block text-lg mb-2">Description ID (Optional)</label>
        <textarea name="description_id" id="description_id" rows="4" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('description_id') border-red-500 @enderror" onfocus="this.classList.remove('border-red-500')">{{ old('description_id', $movie->description_id) }}</textarea>
        @error('description_id')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="release_date" class="block text-lg mb-2">Release Date</label>
        <input type="date" id="release_date" name="release_date" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('release_date') border-red-500 @enderror" value="{{ old('release_date', $movie->release_date) }}" onfocus="this.classList.remove('border-red-500')">
        @error('release_date')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label for="categories" class="block text-lg mb-2">Categories (Optional)</label>
        <select name="categories[]" id="categories" multiple class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 h-32 @error('categories.*') border-red-500 @enderror">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (collect(old('categories', $movie->categories->pluck('id')))->contains($category->id)) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
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
                <option value="{{ $genre->id }}" {{ (collect(old('genres', $movie->genres->pluck('id')))->contains($genre->id)) ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>
        @error('genres.*')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label for="cast_text" class="block text-lg mb-2">Cast Members (Optional, comma-separated)</label>
        <input type="text" id="cast_text" name="cast_text" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('cast_text') border-red-500 @enderror"
        value="{{ old('cast_text', $movie->castMembers->pluck('name')->implode(', ')) }}"
        onfocus="this.classList.remove('border-red-500')">
        @error('cast_text')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      
      <div>
        <label for="image" class="block text-lg mb-2">New Poster Image (Optional)</label>
        @if($movie->image)
            <img src="{{ asset($movie->image) }}" alt="{{ $movie->title }}" class="w-32 h-auto rounded mb-2">
        @endif
        <input type="file" id="image" name="image" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('image') border-red-500 @enderror">
        @error('image')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="image_url" class="block text-lg mb-2">Or Poster Image URL (Optional, overrides uploaded file if both provided)</label>
        <input type="text" id="image_url" name="image_url" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('image_url') border-red-500 @enderror" value="{{ old('image_url', filter_var($movie->image, FILTER_VALIDATE_URL) ? $movie->image : '') }}" onfocus="this.classList.remove('border-red-500')">
        @error('image_url')
          <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <button type="submit" class="bg-blue-600 px-6 py-2 rounded hover:bg-blue-500">Update Movie</button>
      </div>
    </form>

  </div>

@endsection