@extends('layout.dashboardlayout')
@section('content')

<h1 class="text-center">Product Category List</h1>
<div class="container">
  <div class="row ">

<div class="table-responsive text-nowrap col-md-12 ">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Cat Name</th>
          <th>Cat Description</th>
          <th>Cat image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($cat as $item)
        <tr>
          <td> {{ $item->catid}}</td>
          <td>{{ $item->catname }}</td>
          <td>{{ $item->catdes }}</td>
          <td><img src="/procatimg/{{ $item->catimg }}" alt="" width="70px"></td>
          <td>
            <a class="btn btn-primary" href="{{ url('/dashboards/productcat/edit') }}/{{ $item->catid }}"> Edit</a>
            <a class="btn btn-danger" href="{{ url('/dashboards/productcat/delet') }}/{{ $item->catid }}"> Delete</a>
          </td>
        </tr>
        
        @endforeach
     
       
      </tbody>
    </table>
  </div>
</div>
</div>

    
@endsection