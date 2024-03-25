@extends('master')
@section('content')
<div class="container-fluid">
   <div class="container">
   <div class="mt-4 mx-auto bg-pink p-4 position-relative">
 <form action="" method="post" enctype="multipart/form-data">
   @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
    @endif
    @csrf
          <h2 class="text-center text-dark ">Add Product</h2>
    <div class="row d-flex">
      
 <div class="input-group ">
      <span class="input-group-text">Product Name</span>
 <input type="text" class="form-control" placeholder="Product name" aria-label="Username" aria-describedby="basic-addon1" id="name" name="name" placeholder="input name" value="{{old('name')}}"><br>
 <span class="text-danger">@error('name') {{$message}} @enderror</span><br>

 <span class="input-group-text ms-3">Price</span>
 <input type="number" class="form-control" name="price" id="" placeholder="input price" value="{{old('price')}}"><br>
 <span class="text-danger">@error('price') {{$message}} @enderror</span><br>
 </div>


<div class="input-group my-3">
  <span class="input-group-text">Description</span>


  <input type="text" name="description" class="form-control " id="" placeholder="Description" value="{{old('description')}}">
  <label for="description"></label>
  <span class="text-danger">@error('description') {{$message}} @enderror</span><br>

</div>

<input type="file" name="image1" id="" value="{{old('image1')}}">
<span class="text-danger">@error('image1') {{$message}} @enderror</span><br>

<input type="file" name="image2" id="" value="{{old('image2')}}">
<span class="text-danger">@error('image2') {{$message}} @enderror</span><br>

<input type="file" name="image3" id="" value="{{old('image3')}}">
<span class="text-danger">@error('image3') {{$message}} @enderror</span><br>

<input type="file" name="image4" id="" value="{{old('image4')}}">
<span class="text-danger">@error('image4') {{$message}} @enderror</span><br> 

@foreach($categories as $item)
   <span><label for="category_id">{{$item->name}}<input type="radio" name="category_id" id="" style="width:10%;" value="{{$item->id}}"></label></span> 
   <span class="text-danger">@error('category_id') {{$message}} @enderror</span><br>
   
@endforeach
<button type="submit" class="btn btn-outline-dark">Submit</button>
 </form>
   
</div>
</div>
</div>
@endsection