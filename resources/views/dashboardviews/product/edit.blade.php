@extends('layout.dashboardlayout')
@section('content')
<h1 class="text-center"> Edit Product</h1>
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8">

            
            <form action="{{ url('/dashboards/product/update') }}/{{ $por->pid }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label  class="form-label">Product Name</label>
                <input type="text" name="pname" class="form-control" value="{{ $por->ptitle }}"  placeholder="enter your product name" >
               
                
            </div>
            <div class="mb-3">
                <label  class="form-label">Product Description</label>
                <textarea name="pdes"  rows="6" class="form-control">{{ $por->pdes  }}</textarea>
                
            </div>
            <div class="mb-3">
                <label  class="form-label">Product image</label>
                <input type="file" class="form-control" name="pimg">
                <br>
                <img src="/productimg/{{ $por->pimg }}" width="70px" alt="" >
                <input type="hidden" name="oldimg" value="{{ $por->pimg }}"> 
               
            </div>
            <div class="mb-3">
                <label  class="form-label">Product Price</label>
     <input type="number" name="pprice" class="form-control" value="{{ $por->pprice }}"  placeholder="enter your product price" >
               
            </div>
            <div class="mb-3">
                <label  class="form-label">Product category</label>
                <select name="cat" id=""  class="form-select">
                    <option value="" selected disabled>Select Categroy</option>
                    @foreach ($pcat as  $catp)
                    <option value="{{ $catp->catid }}"
                        @if ($catp->catid == $por->catid )
                        {{ "selected" }}                            
                        @endif
                        >{{ $catp->catname }}</option>
                    @endforeach
                </select>

               
            </div>
          
            <button type="submit" class="btn btn-primary">Insart</button>
        </form>
    </div>
    </div>
</div>
@endsection