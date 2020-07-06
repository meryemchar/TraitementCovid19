<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>graph</title>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
        </script>

    <style>
        .mydiv{
            
            background-color:rgba(0,10,20,1);
        }

    
    </style>

</head>

<body>
<p>paragraphe</p>


<div class="mydiv" style="width: 70%">
    {!! $chart->container() !!}
    {!! $chart->script() !!}
</div>


</body>
</html>