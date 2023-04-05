@extends('layout.homelayout')

@section('content')

<h1 class="text-center mt-5 "> Details Page</h1>



<br>
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="/productimg/{{ $data->pimg }}" width="100%" height="400px" alt="">
        </div>
        <div class="col-md-6">
            <h3>{{ $data->ptitle  }}</h3>
            <p>{{ $data->pdes }}</p>
            <p class="text-bold">Price :{{ $data->pprice }}PKR</p>
            <a href="{{ url('/allcart') }}"  class="btn btn-primary">Add to Cart </a>

        </div>
            
    </div>
</div>
    
@endsection