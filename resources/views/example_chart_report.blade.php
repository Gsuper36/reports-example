<html>
    <head>
        <title> {{ $title }} </title>
    </head>

    <body>
        @foreach ($charts as $chart)
            {!! $chart->html() !!}
        @endforeach
    </body>
</html>
