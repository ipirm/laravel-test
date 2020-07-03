<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
<form method="POST" action="{{ route('sum') }}">
    @csrf
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <input id="first" type="number"
           class="AnimatedForm__textInput {{ $errors->has('first') ? ' is-invalid' : '' }}"
           data-empty="false" name="first" value="{{ old('first') }}"
           autocomplete="first" autofocus>
    <input id="second" type="number"
           class="AnimatedForm__textInput {{ $errors->has('second') ? ' is-invalid' : '' }}"
           data-empty="false" name="second" value="{{ old('second') }}"
           autocomplete="second" autofocus>
    <input type="submit" value="Сложить">
</form>
</body>
</html>
