<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $config['title'] }}</title>
</head>
<body>
  
  {{-- <a href="{{ $menu['home'] }}">Home</a>
  <a href="{{ $menu['movies'] }}">Movies</a>
  <a href="{{ $menu['about'] }}">About</a>
  <a href="{{ $menu['contact'] }}">Contact</a>
  <a href="{{ $menu['pricing'] }}">Pricing</a>
  <a href="{{ $menu['login'] }}">Login</a> --}}
  
  <ul>
    @foreach ($menu as $key => $link)
    <li><a href="{{ $link }}">{{ $key }}</a></li>
    @endforeach
  </ul>

  <h1>{{ $pageTitle }}</h1>
  
  <ul>
    @foreach ($movies as $movie)
    <li>{{ $movie['title'] }}</li>
    <li>{{ $movie['description'] }}</li>
    <li>{{ $movie['year'] }}</li>
    <li>{{ $movie['rating'] }}</li>
    <br>
    @endforeach
  </ul>
  
  {{ dd($config) }}

  {{ dd($movies) }}

</body>
</html>