@extends('cms.cms_master')

@section('main_content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit Category</h1>
    </div>
    <div class="row">
      <div class="col-8">






      <form action="{{ url('cms/categories/'.$categories['id']) }}" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
        @csrf  
        {{-- @method('patch') --}}

        <input type="hidden" id="edit_categories" name="_method" value="patch">

          <div class="form-group">
            <label for="title"><span class="text-danger">*</span> Title</label>
            <input value="{{ $categories['title'] }}" type="text" name="title" id="title" class="form-control field-input-cms original-text">
            <small class="text-muted">The Title, min 2 chars max 255 chars</small><br>
            <span class="text-danger">{{ $errors->first('title') }}</span>
          </div>  

          <div class="form-group">
            <label for="url"><span class="text-danger">*</span> Category Url</label>
            <input value="{{ $categories['url'] }}" type="text" name="url" id="url" class="form-control field-input-cms target-text">
            <small class="text-muted">The Category URL, only small letters, - ,numbers</small><br>
            <span class="text-danger">{{ $errors->first('url') }}</span>
          </div>  

          <div class="form-group">
              <label for="article"><span class="text-danger">*</span> Description</label>

          <textarea name="description" id="article" class="form-control">{{ $categories['description'] }}</textarea>
          
              <small class="text-muted">The Description, min 2 chars</small><br>
              <span class="text-danger">{{ $errors->first('description') }}</span>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input name="image" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose Category Image</label>
                </div>
              </div>

              <div class="input-group mb-3">
              <img src="{{ asset('images/' . $categories['image']) }}">
              </div>

              <div class="form-group">
                  <small class="text-muted">The Image must be: jpg,jpeg,png,gif with max size: 5mb</small><br>
                  <span class="text-danger">{{ $errors->first('image') }}</span>
              </div>
              
          <a class="btn btn-secondary" href="{{ url('cms/categories') }}">Cancel</a>
          <input class="btn btn-primary" name="submit" type="submit" value="Save Category">   
        </form>







      </div>
    </div>
  </main>
  @endsection