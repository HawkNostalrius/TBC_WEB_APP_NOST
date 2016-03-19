<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js">--}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/simple-sidebar.css">
</head>
<body>
    <header>
        @if (Auth::user())
        <div class="container-fluid">
            <div class="row">
                    @include('header')
            </div>
        </div>
        @endif
    </header>

    <div>
        <div id="wrapper">
            @if (Auth::user())
                @include('sidebar')
            @endif

            <div id="page-content-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        @include('flash::message')
                    </div>

                    <div class="row">
                         @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        {{--@include('footer')--}}
    </footer>
    <script src="/js/jquery-2.2.1.min.js" type="text/javascript" defer="defer"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript" defer="defer"></script>

    <script type="text/javascript">
        window.onload = function()
        {
            $('#flash-overlay-modal').modal();
        };
    </script>

</body>
</html>