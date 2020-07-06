@extends('default',['titre'=>'Contaminations selon les régions']))




@section('content')




<div class="mydiv" style="width: 100%">
    {!! $chart->container() !!}
    {!! $chart->script() !!}
</div>

                
@endsection