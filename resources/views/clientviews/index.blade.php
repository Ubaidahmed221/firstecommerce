@extends('layout.homelayout')

@section('content')

<h1 class="text-center mt-5 ">Welcome To Index Page</h1>

<br>
<div class="container">
    <div class="row">
        @foreach ($data as $item)
        <div class="col-md-4 mt-3">
            <div class="card p-2">
                <img src="/productimg/{{ $item->pimg }}" width="100%" height="200px" alt="">
                <h3>{{ $item->ptitle }}</h3>
                <p>{{ $item->pdes }}</p>
                <div class="d-flex justify-content-between p-2">

                    <a href="{{ url('/details') }}/{{ $item->pid }}" class="btn btn-primary">More</a>
                    <a href="{{ url('/addtocart') }}/{{ $item->pid }}" class="btn btn-success">Add to Cart</a>
                    
                </div>
            </div>

        </div>
            
        @endforeach
    </div>
</div>
    
@endsection