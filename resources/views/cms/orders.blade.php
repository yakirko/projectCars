@extends('cms.cms_master')

@section('main_content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Orders</h1>
    </div>
 
    <div class="table-responsive mt-5">

      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>User ID</th>
            <th>Total Order Amount</th>
            <th>Order Created</th>
            <th>Order updated</th>
            <th>Order Detailes</th>
          </tr>
        </thead>
        
        <tbody>

          @foreach ($allOrders as $item)
          <tr>
              <td>{{ $item['id'] }}</td>

              <td>{{ $item['user_id'] }}</td>
              <td>{{ $item['total'] }}</td>
              <td>{{ $item['created_at'] }}</td>
              <td>{{ $item['updated_at'] }}</td>

              {{-- decode the order encription one by one --}}
              <td>
                  @foreach (unserialize($item['data']) as $item)
                    {{$item['name']}}  ,
                  @endforeach
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
