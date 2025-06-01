@extends('app')

@section('content')

  <div class="flex flex-col md:flex-row items-start">

    <div class="w-full md:w-1/3">
      <img src="{{ $movie->image ? asset($movie->image) : asset('images/placeholder.jpg') }}" alt="{{ $movie->title }}" class="rounded-lg shadow-lg aspect-[2/3] object-cover">
    </div>

    <div class="md:ml-10 mt-5 md:mt-0 w-full md:w-2/3">
      <h1 class="text-4xl font-bold mb-1">{{ $movie->title }}</h1>
      @if($movie->title_japanese)
      <h2 class="text-gray-400 text-lg font-bold mb-4">{{ $movie->title_japanese }}</h2>
      @endif
      <p class="text-gray-400 text-lg mb-4">
        Release Date: <span class="text-white">{{ \Illuminate\Support\Carbon::parse($movie->release_date)->format('M d, Y') }}</span>
      </p>
      <h3 class="text-xl font-semibold mb-2">Description (English)</h3>
      <p class="text-lg mb-4">{{ $movie->description }}</p>
      
      @if($movie->description_id)
      <h3 class="text-xl font-semibold mb-2">Deskripsi (Bahasa Indonesia)</h3>
      <p class="text-lg mb-4">{{ $movie->description_id }}</p>
      @endif
        
      @if($movie->castMembers && $movie->castMembers->count() > 0)
      <h3 class="text-xl font-semibold mb-2">Voice Actors (Seiyuu)</h3>
      <p class="text-gray-400 mb-4">
        {{ $movie->castMembers->pluck('name')->implode(', ') }}
      </p>
      @endif

      @if($movie->genres && $movie->genres->count() > 0)
      <h3 class="text-xl font-semibold mb-2">Genres</h3>
      <p class="text-gray-400 mb-4">
        {{ $movie->genres->pluck('name')->implode(', ') }}
      </p>
      @endif

      @if($movie->categories && $movie->categories->count() > 0)
      <h3 class="text-xl font-semibold mb-2">Categories</h3>
      <p class="text-gray-400 mb-4">
        {{ $movie->categories->pluck('name')->implode(', ') }}
      </p>
      @endif
      
      {{-- Display average rating --}}
      @if($movie->ratings && $movie->ratings->count() > 0)
        @php
            $averageRating = $movie->ratings->avg('rating');
        @endphp
        <h3 class="text-xl font-semibold mb-2">Average Rating</h3>
        <p class="text-gray-400 mb-4">
            {{ number_format($averageRating, 1) }} / 5 (based on {{ $movie->ratings->count() }} ratings)
        </p>
      @else
        <p class="text-gray-400 mb-4">No ratings yet.</p>
      @endif


      <div class="flex space-x-4 mt-5">
        {{-- Ensure $movieId is passed from controller, which should be $movie->id --}}
        <a href="{{ route('movie.edit', $movie->id) }}"><button class="bg-green-600 px-3 py-2 text-sm rounded hover:bg-green-500">Edit</button></a>
        <form id="delete-form-{{ $movie->id }}" action="{{ route('movie.destroy', $movie->id) }}"
            method="POST" style="display: inline;"> {{-- Changed to inline for button-like behavior --}}
            @csrf
            @method('DELETE')
            <button type="submit"
                    onclick="return confirm('Are you sure you want to delete {{ $movie->title }}?')"
                    class="bg-red-600 px-3 py-2 text-sm rounded hover:bg-red-500">
              Delete
            </button>
        </form>
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