@extends('layout.dashboardlayout')
@section('content')
<h1 class="text-center">Product Edit Category</h1>
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8">

            <form action="{{ url('/dashboards/productcat/update') }}/{{ $cat->catid }}" method="post"  enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label  class="form-label">Category Name</label>
 <input type="text" name="catname" class="form-control" value="{{ $cat->catname }}"   >
                @error('catname')
                <p class="text-danger">{{ $message }}</p>
                    
                @enderror
                
            </div>
            <div class="mb-3">
                <label  class="form-label">Category Description</label>
                <textarea name="catdes"  rows="6" class="form-control">{{ $cat->catdes }}</textarea>
                @error('catdes')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Category image</label>
                <input type="file" class="form-control" name="catimg"  >
                <input type="hidden" name="oldimg" value="{{ $cat->catimg }}">
                <br>
                <img src="/procatimg/{{ $cat->catimg }}" width="90px" alt="">
                @error('catimg')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
          
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    </div>
</div>
@endsection