@extends('master')

@section('content')


@if(!empty($content))

    @foreach($content['content'] as $val)
    <div class="row">
        <div class="col-12">
        <h1 class="text-shadow">{{$val['c_title']}}</h1>
        <p> {{$val['c_article']}} </p>
        </div>
    </div>

    @endforeach

@else
<div class="row">
        <div class="col-12">
       <i>no content to show....</i>
        </div>
    </div>
@endif

@endsection