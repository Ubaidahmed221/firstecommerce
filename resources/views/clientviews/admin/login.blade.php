@extends('layout.homelayout')
@section('content')
<h1 class="text-center mt-4 text-bold"style="color:black; font-size: 40px"> Admin Login</h1>
<div class="container mt-5">
    <div class="row">
        <div class="offset-md-3 col-md-6">
            @if (session()->has('status'))
            <p class="text-danger">{{session()->get('status') }}</p>
                
            @endif
            
            <form action="{{ url('/admin/login/store') }}" method="post">
                @csrf
         
            <div class="mb-3">
                <label  class="form-label">admin Email</label>
         <input type="email" name="email" class="form-control" value="{{ old('email') }}"  placeholder="enter your Costomer email" >
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">admin Password</label>
         <input type="password" name="password" class="form-control" value="{{ old('password') }}"  placeholder="enter your Costomer password" >
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
           
         
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <br>
       

    </div>
    </div>
</div>
@endsection