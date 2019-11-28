@extends('master')

@section('content')
@if(!empty($content['purchase']))


<h2>Orders - {{$content['purchase'][0]->title}}</h2>

    <div class="container">
        <div class="row">

            @foreach($content['purchase'] as $val)
                <div class="categories-boxs col-md-4">
                    <div class="card" style="width: 25rem;">
                        <img class="categories-boxs-images card-img-top img-thumbnail" src="{{ asset('images/'.$val->pimage) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$val->user_id}}</h5>
                            <p class="card-text">{!! str_limit($val->$data) !!}</p>
                            <p class="card-text">{!! str_limit($val->$price) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        @if($content['purchase'])
            {{$content['purchase']->links()}}
        @endif
    </div>
@else
    <div class="row">
        <div class="col-12">
            <i>There Are Orders To Show Yet.... sorry</i>
        </div>
    </div>
@endif


@endsection