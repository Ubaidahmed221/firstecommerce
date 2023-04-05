@extends('layout.dashboardlayout')
@section('content')
<h1 class="text-center">Costomer Edit</h1>
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8">

            <form action="{{ url('/dashboards/costomer/update') }}/{{ $data->cid }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label  class="form-label">Costomer Name</label>
                <input type="text" name="cname" class="form-control" value="{{ $data->cname  }}"  placeholder="enter your Costomer name" >
                @error('cname')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Costomer Email</label>
         <input type="email" name="cemail" class="form-control" value="{{ $data->cemail }}"  placeholder="enter your Costomer email" >
                @error('cemail')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Costomer Password</label>
         <input type="password" name="cpassword" class="form-control" value="{{ $data->cpassword }}"  placeholder="enter your Costomer password" >
                @error('cpassword')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Costomer Number</label>
                <input type="number" name="cnumber" class="form-control" value="{{ $data->ccontact }}"  placeholder="enter your Costomer cnumber" >
                @error('cnumber')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Costomer Address</label>
                <textarea name="caddres" rows="8" class="form-control">{{ $data->caddres }}</textarea>
                
                @error('caddres')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
         
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
</div>
@endsection