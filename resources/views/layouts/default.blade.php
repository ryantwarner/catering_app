<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body>
        <a href="{{ url('/') }}">Home</a>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @include('includes.header')
        <main role="main">
            @yield('content')
        </main>
        @include('includes.footer')
    </body>
</html>