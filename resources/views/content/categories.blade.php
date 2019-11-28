@extends('master')

@section('content')

<h1>Cars Categories</h1>


@if(!empty($content))

        <div class="container">
          <div class="row">
                 @foreach($content as $val)
                     <div class="Categories-boxs col-md-4">

                                 <div class="card" style="width: 20rem;">
                                         <img class="Categories-boxs-images card-img-top img-thumbnail" src="{{ asset('images/'.$val['image'])}}" alt="Card image cap">
                                         <div class="card-body">
                                             <h5 class="card-title">{{$val['title']}}</h5>
                                             <p class="card-text">{!! str_limit($val['description'], 100)!!}</p>
                                             <a href="{{ url('shop/'.$val['url']) }}" class="btn btn-primary">To All Products</a>
                                    </div>
                                </div>
                     </div>
                 @endforeach
          </div>
        </div>
@else
<div class="row">
        <div class="col-12">
       <i>no content to show....</i>
        </div>
    </div>
@endif

@endsection