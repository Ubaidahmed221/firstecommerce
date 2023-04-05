@extends('layout.dashboardlayout')
@section('content')

<h1 class="text-center">Costomers List</h1>
<div class="container">
  <div class="row ">

<div class="table-responsive text-nowrap col-md-12 ">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Costomer Name</th>
          <th>Costomer Email</th>
          <th>Costomer Contact</th>
          <th>Costomer Password</th>
          <th>Costomer Address</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
          @foreach ($cut as $item)
          <tr>
       <td>{{ $item->cid }}</td>
       <td>{{ $item->cname }}</td>
       <td>{{ $item->cemail }}</td>
       <td>{{ $item->ccontact }}</td>
       <td>{{ $item->cpassword }}</td>
       <td>{{ $item->caddres }}</td>
       <td>
        <a href="{{ url('/dashboards/costomer/edit') }}/{{ $item->cid }}" class="btn btn-primary">Edit</a>
        <a  onclick="myinfo({{ $item->cid }})" href="{{ url('/dashboards/costomer/delet') }}/{{ $item->cid }}" class="btn btn-danger">Delect</a>
       </td>
    </tr>
       @endforeach 
      </tbody>
    </table>
  </div>
</div>
</div>
<script>
  function myinfo(id){
    $Dc = confirm('Do You Want to Delect ?');

    if($Dc == true){
      window.location.href = "/dashboards/costomer/delet/"+id;
    }
  }


</script>

    
@endsection