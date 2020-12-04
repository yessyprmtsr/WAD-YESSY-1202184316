@extends('template.partial.layout')
@section('content')
<p style="text-align: center">There is no data ..</p>
<a href="{{ route('products.create')}}" class="btn btn-dark mb-5" style="margin-left:45%">Add Product</a>
<div class="row">
    @foreach ($products as $item)
<div class="col-lg-4">
<div class="card" style="width: 20rem;height: 35rem" row>
<img class="card-img-top" src="{{ asset('uploads/image/'.$item->img_path)}}" alt="Card image cap">
    <div class="card-body">
    <h4 class="card-title">{{$item->name}}</h4>
    <p class="card-text">{{$item->description}}</p>
    <h3 class="card-title">$ {{$item->price}}</h3>
    <a href="{{ route('orders.show',[$item->id])}}" class="btn btn-success">Order</a>
    </div>
   
  </div>
</div>
@endforeach
</div>
@endsection