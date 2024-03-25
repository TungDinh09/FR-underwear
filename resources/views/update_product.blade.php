@extends('master')
@section('content')
<div class="container-fluid">
   <div class="container">
     <div class="mt-4 mx-auto bg-pink p-4 position-relative">
       <form method="POST" action="/admin/product_update/{{$products->id}}" enctype="multipart/form-data">
         @method('PATCH')
         @csrf
         <h2 class="text-center text-info">Update Shipping</h2>
         <div class="row d-flex">
          <div class="input-group ">
            <span class="input-group-text">Product Name</span>
       <input type="text" class="form-control" placeholder="Product name" aria-label="Username" aria-describedby="basic-addon1" id="name" name="name" placeholder="input name" value="{{$products['name']}}"><br>
       <span class="text-danger">@error('name') {{$message}} @enderror</span><br>
      
       <span class="input-group-text ms-3">Price</span>
       <input type="number" class="form-control" name="price" id="" placeholder="input price" value="{{$products['price']}}"><br>
       <span class="text-danger">@error('price') {{$message}} @enderror</span><br>
       </div>
      
           <div class="input-group my-3">
            <span class="input-group-text">Description</span>
          
          
            <input type="text" name="description" class="form-control " id="" placeholder="Description" value="{{$products['description']}}">
            <label for="description"></label>
            <span class="text-danger">@error('description') {{$message}} @enderror</span><br>
          
          </div>

            <input type="file" name="image1" id="" value="{{$products['image1']}}">
            <span class="text-danger">@error('image1') {{$message}} @enderror</span><br>
            
            <input type="file" name="image2" id="" value="{{$products['image2']}}">
            <span class="text-danger">@error('image2') {{$message}} @enderror</span><br>
            
            <input type="file" name="image3" id="" value="{{$products['image3']}}">
            <span class="text-danger">@error('image3') {{$message}} @enderror</span><br>
            
            <input type="file" name="image4" id="" value="{{$products['image4']}}">
            <span class="text-danger">@error('image4') {{$message}} @enderror</span><br> 
          
           
            

                      @foreach($categories as $item)
   <br> <input type="radio" name="category_id" id="" value="{{$item->id}}" ><span>{{$item->name}} </span><br>
@endforeach
         </div>
 
         <div
           class="position-relative mx-auto justify-content-center align-items-center d-flex"
         >
           <button type="submit" class="btn btn-outline-dark mt-3">
             Submit
           </button>
         </div>
       </form>
     </div>
   </div>
   @endsection