{{--@extends('master')
@section('content')
<div class="container">
   <div class="row">
       <div class="col-sm-6">
       <img
              class="card__image"
              src="{{asset('storage/photos/'.$product['photo1'])}}"
              alt="wave"
            />
            <img
              class="card__image"
              src="{{asset('storage/photos/'.$product['photo2'])}}"
              alt="wave"
            />
            <img
              class="card__image"
              src="{{asset('storage/photos/'.$product['photo3'])}}"
              alt="wave"
            />
            <img
              class="card__image"
              src="{{asset('storage/photos/'.$product['photo4'])}}"
              alt="wave"
            />
       </div>
       <div class="col-sm-6">
           <a href="/">Go Back</a>
       <h2>{{$product['name']}}</h2>
       <h3>Price : {{$product['price']}}</h3>
       <h4>Details: {{$product['description']}}</h4>
       <h4>category: {{$product['category_id']}}</h4>
       <br><br>
       <form action="/add_to_cart" method="POST">
           @csrf
        <input type="hidden" name="product_id" value={{$product['id']}}>
        <input type="number" name="quantity" id="" value="1">
       <button class="btn btn-primary">Add to Cart</button>
       </form>
       <br><br>
       <button class="btn btn-success">Buy Now</button>
       <br><br>




       <br><br>
    </div>
   </div>
</div>

    
@endsection--}}
@extends('master')
@section('content')
<main class="container-pd-detail d-flex bg-pink">
  <div class="pd-detail col-12">
    <div class="pd-img col-8">
      <!-- thêm ảnh vào đây -->
      <img src="{{asset('storage/photos/'.$product_details[0]->photo1)}}" alt="" />
      <img src="{{asset('storage/photos/'.$product_details[0]->photo2)}}" alt="" />
      <img src="{{asset('storage/photos/'.$product_details[0]->photo3)}}" alt="" />
      <img src="{{asset('storage/photos/'.$product_details[0]->photo4)}}" alt="" />
      <!-- thêm ảnh vào đây -->
    </div>
    <div class="d-flex flex-column">
      <div class="pd-name"><b> {{$product_details[0]->name}}</b></div>

      <div class="pd-rate">
        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
        ><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
        ><i class="fa-solid fa-star"></i>
        <span class="quantity-rate">(1)</span>
        <a href="">Question and Answers</a>
      </div>

      
        <p>{{$product_details[0]->description}}</p>


        <div class="submit pt-2">
        
          <div>
            
  <form action="/add_to_cart" method="POST">
             
              @csrf
           <input type="hidden" name="product_id" value={{$product_details[0]->id}}>
           <span>quantity: </span><input type="number" name="quantity" id="" value="1">
           <span class="text-danger">@error('product_detail_id') {{$message}} @enderror</span>
 
    <p>Select Size Color</p>
    <div class="input-group mb-3 col-12 d-flex flex-wrap mt-4">
      
      @foreach ($product_details as $item)
      <div class="pd-size">
              <!-- input size và color -->
              <div class="container-input-size-color">
                <label class="input-size-color">
                  <input type="radio" name="product_detail_id" value="{{$item->id}}"id="{{$item->id}}"/>
                  <div class="checkmark2">
                    <span
                      class="radio-color"
                      style="background-color: {{DB::table('colors')->where('id', $item->color_id)->get('color')[0]->color}};"
                    ></span>
                    <span> {{DB::table('sizes')->where('id', $item->size_id)->get('size')[0]->size}}</span>
                  </div>
                </label>
              </div>
            </div>
      {{-- <div class="input-group-text col-4">
        <input class="form-check-input mt-0" type="checkbox" name="product_detail_id" value="{{$item->id}}"id="{{$item->id}}"
        style ="background-color: {{DB::table('colors')
          ->where('id', $item->color_id)->get('color')[0]->color}};" >
      
          <span><p>{{DB::table('sizes')->where('id', $item->size_id)->get('size')[0]->size}}</p> {{DB::table('colors')->where('id', $item->color_id)->get('color')[0]->color}}</span> 
    
      </div> --}}
      @endforeach
    </div>
         
      
           {{-- <input type="radio" name="product_detail_id" value="{{$item->id}}"id="{{$item->id}}">
           <label for="{{$item->id}}" color: {{DB::table('colors')
           ->where('id', $item->color_id)->get('color')[0]->color}};">

            {{DB::table('colors')->where('id', $item->color_id)->get('color')[0]->color}}

          </label>
           <span><p>{{DB::table('sizes')->where('id', $item->size_id)->get('size')[0]->size}} <br></p></span> 
 --}}


 
   
           
           <div class="pd-price text-success">{{$product_details[0]->price}}$</div>

           <div>
            <button class="btn btn-outline-dark ms-4 mt-3">Add to Cart</button>
           </div>
         
          </form>
          </div>
        </div>
          </div>

          
       
      </div>
</div>
        
  
</main>
@endsection





