@extends('cms.cms_master')

@section('main_content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit Site Products</h1>
    </div>
    <p>
      <a class="btn btn-primary btn-lg" href="{{ url('cms/products/create') }}">Add A Product</a>
    </p>
    <div class="table-responsive mt-5">



      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Categorie ID</th>
            <th>Product Title</th>
            <th>Product Information</th>
            <th>Product URL</th>
            <th>Product Price</th>
            <th>Product Image</th>
            <th>Created At</th>
            <th>Operations</th>
          </tr>
        </thead>
      
        <tbody>
          @foreach ($products as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->c_title }}</td>
              <td>{{ $item->ptitle }}</td>
              <td>{{ $item->article }}</td>
              <td>{{ $item->purl }}</td>
              <td>{{ $item->price }}</td>

              <td>
                <img width="100" src="{{ asset('images/' . $item->pimage) }}">
              </td>

              <td>{{ $item->created_at }}</td>

              <td>
                <a class="btn btn-primary btn-sm" href="{{ url('cms/products/' . $item->id . '/edit') }}">Edit</a>
                <a class="btn btn-danger btn-sm" href="{{ url('cms/products/' .  $item->id  ) }}">Delete</a>
              </td>

            </tr>
          @endforeach
        </tbody>

      </table>

            {{-- <input type="search" >
            <button onclick="search()">search</button> --}}


    </div>
  </main>
  @endsection