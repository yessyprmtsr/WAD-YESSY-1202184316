@extends('template.partial.layout')
@section('content')
<div class="card mb-3" style="width: 55rem;height: 16rem;margin-left:15%;margin-top:30px">
  <div class="row no-gutters">
    <div class="col-md-4">
        <img class="card-img-top" style="height: 300px" src="{{ asset('uploads/image/'.$products->img_path)}}" alt="Card image cap">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title">{{$products->name}}</h3>
        <p class="card-text">{{$products->description}}</p>
        <p class="card-text"><small class="text-muted">Stock: {{$products->stock}}</small></p>
        <h3 class="card-title">$ {{$products->price}}</h3>
    </div>
    </div>
  </div>
</div>
<div class="card" style="width: 55rem;height: 23rem;margin-left:15%;margin-top:30px"">
    <div class="card-body">
      <h3 class="card-title text-center">Buyer Information</h3>
      <form style="margin-top:10px" action="{{ route('orders.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="products_id" value="{{$products->id}}" class="form-control" id="exampleFormControlInput1">
        <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" name="buyer_name" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Contact</label>
            <input type="text" name="buyer_contact" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Quantity</label>
            <input type="number" name="amount" style="width: 500px" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-success" >
        </div>
      </form>
    </div>
  </div>
  



@endsection