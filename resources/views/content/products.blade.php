@extends('master')

@section('content')

@if(!empty($content['products']))

<h1>Cars Products - {{$content['products'][0]->title}}</h1>

        <div class="container">
          <div class="row">

                    {{-- {{dd($content['products'])}} --}}
                 @foreach($content['products'] as $val)
                     <div class="Categories-boxs col-md-4">

                                 <div class="card" style="width: 20rem;">
                                         <img class="Categories-boxs-images card-img-top img-thumbnail" src="{{ asset('images/'.$val->pimage) }}" alt="Card image cap">
                                         <div class="card-body">
                                             <h5 class="card-title">{{$val->ptitle}}</h5>
                                             <p class="card-text">{!! str_limit($val->article, 100) !!}</p>
                                             <a href="{{ url('shop/'.$val->url.'/'.$val->purl)}}" class="btn btn-primary">This Product info</a>
                                    </div>
                                </div>
                     </div>
                 @endforeach
          </div>

            @if($content['pagi_jump'])
                  {{$content['products']->links()}}
            @endif      
        </div>
@else
<div class="row">
        <div class="col-12">
       <i>no content to show....</i>
        </div>
    </div>
@endif

@endsection