@extends('cms.cms_master')

@section('main_content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Add A Product</h1>
    </div>
    <div class="row">
      <div class="col-8">



      <form action="{{ url('cms/products') }}" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
        @csrf  

         <div class="form-group">
           <label for="categorie_id"><span class="text-danger">*</span> Choose Categorie </label>
           <select name="categorie_id" class="form-control" id="categorie_id">
              <option value="">Please Choose A Categorie...</option>
              @foreach ($categories as $cat)
                 <option value="{{$cat['id']}}">{{$cat['title']}}</option>
              @endforeach
           </select>
           <span class="text-danger">{{ $errors->first('categorie_id') }}</span>
         </div>  

          <div class="form-group">
            <label for="ptitle"><span class="text-danger">*</span> Title</label>
            <input value="{{ old('ptitle') }}" type="text" name="ptitle" id="ptitle" class="form-control field-input-cms original-text">
            <small class="text-muted">The Title, min 2 chars max 255 chars</small><br>
            <span class="text-danger">{{ $errors->first('ptitle') }}</span>
          </div>  

          <div class="form-group">
            <label for="purl"><span class="text-danger">*</span> Product Url</label>
            <input value="{{ old('purl') }}" type="text" name="purl" id="purl" class="form-control field-input-cms target-text">
            <small class="text-muted">The Product URL, only small letters, - ,numbers</small><br>
            <span class="text-danger">{{ $errors->first('purl') }}</span>
          </div>  

          <div class="form-group">
            <label for="price"><span class="text-danger">*</span> Product Price</label>
            <input value="{{ old('price') }}" type="text" name="price" id="price" class="form-control field-input-cms target-text">
            <small class="text-muted">The Product URL, only small letters, - ,numbers</small><br>
            <span class="text-danger">{{ $errors->first('price') }}</span>
          </div>  

          <div class="form-group">
              <label for="article"><span class="text-danger">*</span> Product Description</label>

          <textarea name="article" id="article" class="form-control">{{ old('article') }}</textarea>
          
              <small class="text-muted">The Description, min 2 chars</small><br>
              <span class="text-danger">{{ $errors->first('article') }}</span>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input name="image" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose Product Image</label>
                </div>
              </div>

              <div class="form-group">
                  <small class="text-muted">The Image must be: jpg,jpeg,png,gif with max size: 5mb</small><br>
                  <span class="text-danger">{{ $errors->first('image') }}</span>
              </div>
              
          <a class="btn btn-secondary" href="{{ url('cms/products') }}">Cancel</a>
          <input class="btn btn-primary" name="submit" type="submit" value="Save Product">
        </form>







      </div>
    </div>
  </main>
  @endsection