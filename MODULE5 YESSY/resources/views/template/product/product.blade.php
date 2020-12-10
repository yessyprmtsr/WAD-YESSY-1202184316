@extends('template.partial.layout')
@section('content')
   
    <p style="text-align: center">There is no data ..</p>
    <a href="{{ route('products.create')}}" class="btn btn-dark mb-5" style="margin-left:45%">Add Product</a>
    <!--Nampilin alert save-->
    @if (session('success'))
    <div class="alert alert-success">{{ session('success')}}</div>
    @endif
    <!--Nampilin alert update-->
    @if (session('info'))
    <div class="alert alert-warning">{{ session('info')}}</div>
    @endif
    <table class="table table-bordered mt-5" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($products as $item)
        <tr> <th scope="col">{{ $loop->iteration}}</th> 
        <td scope="col">{{ $item->name }}</td> 
        <td scope="col">{{ $item->price }}</td> 
        <td scope="col">
        <a href="{{ route('products.update',[$items->id])}}" class="btn btn-primary">Edit</a>
        <form action="{{ route('products.destroy', [$item->id]) }}" method="POST" id="deleteForm">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-danger">Delete</td> </tr>
        </form>
        @endforeach
        </tbody>
      </table>
@endsection