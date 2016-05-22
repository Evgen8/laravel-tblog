<!DOCTYPE html>
<html lang="ru">

@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/Article.css') }}"/>
@stop
@include('layout.header')

<body>

@include('layout.menu')

@yield('content')

@include('layout.footer')

</body>
</html>