@extends('layout.dashboardlayout')
@section('content')
<h1 class="text-center"> Add Product</h1>
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8">

            
            <form action="{{ url('/dashboards/product/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label  class="form-label">Product Name</label>
      <input type="text" name="pname" class="form-control" value="{{ old('pname') }}"  placeholder="enter your product name"/>
                @error('pname')
                <p class="text-danger">{{ $message }}</p>
                    
                @enderror
                
            </div>
            <div class="mb-3">
                <label  class="form-label">Product Description</label>
                <textarea name="pdes"  rows="6" class="form-control">{{ old('pdes') }}</textarea>
                @error('pdes')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Product image</label>
                <input type="file" class="form-control" name="pimg"  >
                @error('pimg')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Product Price</label>
                <input type="number" name="pprice" class="form-control" value="{{ old('pprice') }}"  placeholder="enter your product price" >
                @error('pprice')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Product category</label>
                <select name="cat"  class="form-select">
                    <option value="" selected disabled>Select Categroy</option>
                    @foreach ($cat as  $option)
                    <option value="{{ $option->catid }}">{{ $option->catname }}</option>
                        
                    @endforeach
                </select>
                @error('cat')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
          
            <button type="submit" class="btn btn-primary">Insart</button>
        </form>
    </div>
    </div>
</div>
@endsection