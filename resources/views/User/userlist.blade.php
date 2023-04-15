@extends('layouts.app')

@section('content')

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

button {
  background-color: #04AA6D;
  color: white;


  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;


}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

    @if(session()->get('success'))
    <div class='alert alert-success'>
        {{ session()->get('success') }}
        </div>
    @endif

    <script>
      setTimeout(function() {
                    $('.alert').fadeOut('fast');
                }, 5000);
    </script>


  <a href="{{route ('user.create') }}"><button class="btn btn-primary">insert User</button></a>

              </br>

</br>

<h2 >USER table</h2>
              </br>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />
    <style>
        .container {
            max-width: 600px;
        }
    </style>


<table class="table">
  <tr>
    <th>Sr No.</th>
    <th>Name</th>
    <th>email</th>
    <th>password</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>


    @foreach($data as $row)
    <tr>

        <td>{{$row->id}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->password}}</td>
        <td><a href="{{route ('user.edit',$row->id) }}"><button >Edit</button></a></td>
        <td><form method ="post" class=" form" onClick="return confirm('Are you sure want to delete ??')"  action="{{route ('user.destroy',$row->id) }}">
          @csrf
          @method('DELETE')
          <button >Delete</button>
        </form></td>

    </tr>

    @endforeach
</table>
<div>
     </div>

@endsection
