@extends('layout.homelayout')
@section('content')
<h1 class="text-center mt-4 text-bold " style="color:black; font-size: 40px"> Costomer Register</h1>
<div class="container mt-5">
    <div class="row">
        <div class="offset-md-3 col-md-6">

            
            <form action="{{ url('/costomer/register/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label  class="form-label">Costomer Name</label>
                <input type="text" name="cname" class="form-control" value="{{ old('cname') }}"  placeholder="enter your Costomer name" >
                @error('cname')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Costomer Email</label>
         <input type="email" name="cemail" class="form-control" value="{{ old('cemail') }}"  placeholder="enter your Costomer email" >
                @error('cemail')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Costomer Password</label>
         <input type="password" name="cpassword" class="form-control" value="{{ old('cpassword') }}"  placeholder="enter your Costomer password" >
                @error('cpassword')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Costomer number</label>
                <input type="number" name="cnumber" class="form-control" value="{{ old('cnumber') }}"  placeholder="enter your Costomer cnumber" >
                @error('cnumber')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Costomer Address</label>
                <textarea name="caddres" rows="8" class="form-control">{{ old('caddres') }}</textarea>
                
                @error('caddres')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
         
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <br>
        <a href="">Login</a>

    </div>
    </div>
</div>
@endsection