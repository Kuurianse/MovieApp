<div class="bg-gray-800 p-4 rounded-lg relative group">
    {{-- Prefer using slug for SEO friendly URLs if your routes support it, otherwise use movieId --}}
    <a href="{{ route('movie.show', $slug) }}">
      <img src="{{ $getImage() }}" alt="{{ $title }}" class="w-full rounded-md aspect-[2/3] object-cover"> {{-- Added aspect ratio and object-cover --}}
      <h3 class="text-lg mt-2 truncate">{{ $title }}</h3> {{-- Added truncate --}}
      <p class="text-sm text-gray-400">{{ $releasedate }}</p>
      
      <div class="absolute top-2 right-2 space-x-2 opacity-0 group-hover:opacity-100 transition">
        <a href="{{ route('movie.edit', $movieId) }}"><button class="bg-green-600 p-1 rounded hover:bg-green-500">✏️</button></a>
        <form id="delete-form-{{ $movieId }}" action="{{ route('movie.destroy', $movieId) }}"
            method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        <a href="#" {{-- Changed href to # to prevent navigation before confirm --}}
          onclick="event.preventDefault(); if (confirm('Are you sure you want to delete {{ $title }}?')) { document.getElementById('delete-form-{{ $movieId }}').submit(); }"
          class="bg-red-600 p-1 rounded hover:bg-red-500">
          🗑️
        </a>
      </div>
    </a>
  </div>
