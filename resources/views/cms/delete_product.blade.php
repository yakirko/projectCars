@extends('cms.cms_master')

@section('main_content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Do You Want To Delete This Product</h1>
    </div>
    <div class="row">
      <div class="col-8">





      <form action="{{ url('cms/products/'.$products['id']) }}" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
        @csrf  
        {{-- @method('patch') --}}

        <input type="hidden" name="_method" value="delete">

        <div class="form-group">
          <label for="id"><span class="text-danger">*</span> The ID Number Of The Product: &nbsp &nbsp &nbsp </label>
          <span><b>{{ $products['id'] }}</b></span>
        </div>  

        <div class="form-group">
          <label for="ptitle"><span class="text-danger">*</span> The Product's Title: &nbsp &nbsp &nbsp </label>
          <span><b>{{ $products['ptitle'] }}</b></span>
        </div>  

        <div class="form-group">
          <label for="price"><span class="text-danger">*</span> The Product's Price: &nbsp &nbsp &nbsp</label>
          <span><b>{{ $products['price'] }} &nbsp €</b></span>
        </div>  


        <div class="input-group mb-3">
            <label for="pimage"><span class="text-danger">*</span> The Product's Image: &nbsp &nbsp &nbsp</label>
           <img src="{{ asset('images/' . $products['pimage']) }}">
        </div>
              


          <a class="btn btn-secondary" href="{{ url('cms/products') }}">Cancel</a>
          <input class="btn btn-danger" name="submit" type="submit" value="Delete This Product">   
        </form>







      </div>
    </div>
  </main>
  @endsection