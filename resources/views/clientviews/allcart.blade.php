@extends('layout.homelayout')

@section('content')

<h1 class="text-center ">Details Page</h1>
<div class="conatiner">
  <div class="row offset-1">
    <div class="col-md-10">

      
      <table class="table mt-5">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">PRODUCT tittle</th>
          <th scope="col">Product Image</th>
          <th scope="col">Product Price</th>
          <th scope="col">Product Quantity</th>
          <th scope="col">Total</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
    <tbody>
     {{-- @if (is_array($cart)) --}}
  
     {{ print_r($cart) }}
     {{-- @foreach  ($cart as $product) --}}
     @php
      //  $prices = $product['price'] * $product['quantity'];
     @endphp
     @foreach  ($cart as $item => $product)
     @php
       $prices = $product['price'] * $product['quantity'];
     @endphp
     <tr>
       <td>1</td>
       <td>{{ $product['title'] }}</td>
       <td> <img src="productimg/{{ $product['pimg'] }}" width="50px" alt=""></td>
       <td>{{ $product['price'] }}</td>
       <td>{{ $product['quantity'] }}</td>
       <td>{{ $prices }}</td>
       <td><a href="{{ url('/removecart') }}/{{ $item }}" class="btn btn-danger">Remove</a></td>
      </tr>
      @endforeach 
      
      {{-- @endif --}}
      
    </tbody>
  </table>
</div>
</div>
</div>


 
    
@endsection