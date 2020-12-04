@extends('template.partial.layout')
@section('content')
 
    <form style="margin-top:10px" action="{{ route('products.update',$products)}}" method="POST" enctype="multipart/form-data">
        @method("PUT")
        @csrf
        <h2 style="text-align: center">Update Product</h2>
    <div class="form-group">
      <label for="exampleFormControlInput1">Product Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $products->name }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Price</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">$ USD</div>
          </div>
          <input type="number" name="price" class="form-control" id="inlineFormInputGroupUsername" value="{{ $products->price }}">
        </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{ $products->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Stock</label>
        <input type="number" name="stock" class="form-control" style="width: 500px" value="{{ $products->stock }}">
    </div/>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image file input</label>
        <input type="file" name="img_path" class="form-control-file" id="exampleFormControlFile1" value="{{ $products->img_path }}">
    </div>
    <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-dark" >
    </div>
  </form>
@endsection