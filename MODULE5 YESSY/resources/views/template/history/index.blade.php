@extends('template.partial.layout')
@section('content')
    <h1 class="text-center">History</h1>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success')}}</div>
    @endif
    <p style="text-align: center">There is no data ..</p>
    <a href="{{ route('orders.index')}}" class="btn btn-dark mb-1" style="margin-left:45%">Order Now</a>
    <table class="table table-bordered mt-5" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Product</th>
            <th>Buyer Name</th>
            <th>Contact</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($orders as $item)
        <tr> <th scope="col">{{ $loop->iteration}}</th> 
        <td scope="col">{{ $item->products->name }}</td> 
        <td scope="col">{{ $item->buyer_name }}</td> 
        <td scope="col">{{ $item->buyer_contact }}</td> 
        <td scope="col">{{ $item->amount }}</td> 
        @endforeach
        </tbody>
      </table>
@endsection