@extends('template.partial.layout')
@section('content')
 
    <form style="margin-top:10px" action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2 style="text-align: center">Input Product</h2>
    <div class="form-group">
      <label for="exampleFormControlInput1">Product Name</label>
      <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Price</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">$ USD</div>
          </div>
          <input type="number" name="price" class="form-control" id="inlineFormInputGroupUsername">
        </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Stock</label>
        <input type="number" name="stock" class="form-control" style="width: 500px">
    </div/>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image file input</label>
        <input type="file" name="img_path" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-dark" >
    </div>
  </form>
@endsection