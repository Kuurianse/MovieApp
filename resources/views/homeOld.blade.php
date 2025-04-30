<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
</head>
<body>

  ${-- This is a comment --}

  <ul>
    @foreach ($menu as $key => $link)
      <li><a href="{{ $link }}">{{ $key }}</a></li>
    @endforeach
  </ul>

  <h1>Welcome to the {{ $pageTitle }} Page</h1>

  <h3>Profile</h3>
  <ul>
    <li>Name: {{ $user['name'] }}</li>
    <li>Email: {{ $user['email'] }}</li>
    @if ($user['role'] == 'admin')
      <li>Role: Administrator</li>
    @elseif ($user['role'] == 'user')
      <li>Role: User</li>
    @else
      <li>Role: Guest</li>
    @endif
    {{-- <li>Role: {{ $user['role'] == 'admin' ? 'Administrator' : ($user['role'] == 'user' ? 'User' : 'Guest') }}</li> --}}
  </ul>

  @switch($movieCategory) 
    @case('action')
      <h3>Action Movies</h3>
      @break
    @case('comedy')
      <h3>Comedy Movies</h3>
      @break
    @case('drama')
      <h3>Drama Movies</h3>
      @break
    @case('horror')
      <h3>Horror Movies</h3>
      @break
    @case('romance')
      <h3>Romance Movies</h3>
      @break
    @case('sci-fi')
      <h3>Sci-Fi Movies</h3>
      @break
    @default
      <h3>Unknown Category</h3>
  @endswitch


  <ul>
    <?php $index = 0 ?>
    {{-- @for ($index = 0; $index < count($movies); $index++)
      <li>{{ $movies[$index]['title'] }}<li>
      <li>{{ $movies[$index]['description'] }}</li>
      <li>{{ $movies[$index]['year'] }}
      <li>{{ $movies[$index]['rating'] }}</li><br>
    @endfor --}}
  
    @foreach ($movies as $movie)
        {{-- @if ($movie['year'] < 2000)
          @continue
        @endif --}}
        {{-- @if ($movie['rating'] == 6.5)
          @break
        @endif --}}
        
        {{-- <li>{{ $movie['title'] }}</li>
        <li>{{ $movie['description'] }}</li>
        <li>{{ $movie['year'] }}</li>
        <li>{{ $movie['rating'] }}</li><br> --}}

        {{-- <p>{{ $loop->iteration }}. {{ $movie['title'] }} - {{ $movie['year'] }}</p> --}}

        {{-- @if ($loop->first)
          <p><strong>First Movie: </strong>{{ $movie['title'] }} - {{ $movie['year'] }}</p>
        @elseif ($loop->last)
          <p><strong>Last Movie: </strong>{{ $movie['title'] }} - {{ $movie['year'] }}</p>
        @else
          <p>{{ $movie['title'] }} - {{ $movie['year'] }}</p>
        @endif --}}
          
          {{-- <p>Index-{{ $loop->index }}/{{ $loop->count }}: Remaining-{{ $loop->remaining }}: Iteration-{{ $loop->iteration }}: {{ $movie['title'] }} - {{ $movie['year'] }}</p> --}}
        
        {{-- <p style="{{ $loop->first ? 'color: red' : ($loop->last ? 'color: blue' : '' ) }}">
          {{ $loop->iteration }}. {{ $movie['title'] }} - {{ $movie['year'] }}
        </p> --}}
        {{-- style ganti class kalo pake tailwindcss --}}

          {{-- jadi tinggal panggil saja --}}
          @include('partials._movie', ['movieKey' => $movie, 'iterationKey' => $loop->iteration])
    @endforeach
  
    {{-- @forelse ($movies as $movie)
      <li>{{ $movie['title'] }}</li>
      <li>{{ $movie['description'] }}</li>
      <li>{{ $movie['year'] }}</li>
      <li>{{ $movie['rating'] }}</li><br>
      @if ($loop->last)
        <li>This is the last movie in the list.</li>
      @endif
    @empty
      <li>No movies available.</li>
    @endforelse --}}

    {{-- @while ($index < count($movies))
      <li>{{ $movies[$index]['title'] }}</li>
      <li>{{ $movies[$index]['description'] }}</li>
      <li>{{ $movies[$index]['year'] }}</li>
      <li>{{ $movies[$index]['rating'] }}</li><br>

      @php $index++; @endphp

      @if ($index == count($movies))
        <li>This is the last movie in the list.</li>
      @endif
    @endwhile --}}

  </ul>

</body>
</html>