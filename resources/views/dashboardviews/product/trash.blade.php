@extends('layout.dashboardlayout')
@section('content')

<h1 class="text-center">Product Trash  List</h1>
<div class="container">
  <div class="row ">

<div class="table-responsive col-md-12 ">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>product name</th>
          <th>product Description</th>
          <th>product price</th>
          <th>product image</th>
          <th>category product</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">

        
        
        @if ($cat != null)
        @foreach ($cat as $item) 
        <tr>
          <td>{{ $item->pid }}</td>
          <td>{{ $item->ptitle }}</td>
          <td>{{ $item->pdes }}</td>
          <td>{{ $item->pprice }}</td>
          <td><img src="/productimg/{{ $item->pimg }}" alt="" width="70px"></td>
          <td>{{ $item->catid }}</td>
          <td>
            <a class="btn btn-primary" href="{{ url('/dashboards/product/restore') }}/{{ $item->pid }}">Restore</a>
            <a class="btn btn-danger" href="{{ url('/dashboards/product/forcedelect') }}/{{ $item->pid }}">Delect</a>
          </td>
        </tr>
        
        
        @endforeach
        @else
        <p class="text-danger text-center"> Products Not Found </p>

        @endif
        
     
      </tbody>
    </table>
  </div>
</div>
</div>

    
@endsection