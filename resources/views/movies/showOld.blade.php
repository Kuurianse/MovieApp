<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Moview Show</title>
</head>
<body>
  
  
  <ul>
    @foreach ($menu as $key => $link)
    <li><a href="{{ $link }}">{{ $key }}</a></li>
    @endforeach
  </ul>
  
  <h1>Movie</h1>
  
  <ul>
    <li>{{ $movie['title'] }}</li>
    <li>{{ $movie['description'] }}</li>
    <li>{{ $movie['year'] }}</li>
    <li>{{ $movie['rating'] }}</li>
  </ul>

  {{ dd($movie) }}

</body>
</html>