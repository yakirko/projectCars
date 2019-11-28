@extends('master')

@section('content')
<div class="row">
  <div class="col-12">
    <h1>Shop Checkout Page</h1>
    <p>Welcome to our shop's online cash register!  <br>
       pay today and we will ship your order today!
    </p>
  </div>
</div>
<div class="row">
  <div class="col-10">
    @if ($cart)
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Product</th>
          <th class="text-center">Quantity</th>
          <th>Price</th>
          <th>Sub Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        @foreach ($cart as $item)
            <tr>
              <td>{{ $item['name'] }}</td>
              <td class="text-center">

              <a href="{{ url('shop/update-cart?pid=' . $item['id']) . '&op=minus' }}" class="update-cart-btn"><i class="glyphicon glyphicon-minus">too meny</i></a>
                <input size="1" class="text-center" type="text" value="{{ $item['quantity'] }}">
                <a href="{{ url('shop/update-cart?pid=' . $item['id']) . '&op=plus' }}" class="update-cart-btn"><i class="glyphicon glyphicon-plus">i want one more</i></a>
              </td>
              <td>${{ $item['price'] }}</td>
              <td>${{ $item['price'] * $item['quantity']  }}</td>
              <td class="text-center">
              <a class="text-danger" href="{{ url('shop/remove-item?pid=' . $item['id']) }}"><i class="fa fa-trash-o" style="font-size:36px;color:red"></i>DELETE ITEM</a>
              </td>
             </tr>
        @endforeach

      </tbody>
    </table>


    
  <p>
    <b>Total in Cart:</b> ${{ Cart::getTotal() }}
  <span class="float-right"><a class="btn btn-info" href="{{ url('shop/clear-cart') }}">Clear Cart</a></span>
  </p>
<p><a class="btn btn-primary" href="{{ url('shop/order-now') }}">ORDER NOW!</a></p>
        
    @else
    <p><i>No items in cart...</i></p>
    @endif
  </div>
</div>
@endsection