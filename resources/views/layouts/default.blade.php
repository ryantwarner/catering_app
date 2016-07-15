<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body>
        <a href="{{ url('/') }}">Home</a>
        @if (count($errors) > 0)
            @include('includes.errors')
        @endif
        @if (count($successes) > 0)
            @include('includes.success')
        @endif
        @include('includes.header')
        <main role="main">
            @yield('content')
        </main>
        @include('includes.footer')
    </body>
</html>