@extends('master')
 
@section("content")

<div class="container-fluid bg-pink">
  
  <div class="container d-flex flex-wrap ">
    
    {{-- @foreach($products as $item)
       <div class="card">
         <div class="card__image-holder">
           <img
             class="card__image"
             src="{{asset('storage/photos/'.$item->photo1)}}"
             alt="wave"
           />
         </div>





        
         <div class="card-title">
           <a href="#" class="toggle-info btn">
             <span class="left"></span>
             <span class="right"></span>
           </a>
           <h2>
           {{$item->name}}
             <small>{{$item->price}}</small>
           </h2>
         </div>
         <div class="card-flap flap1">
           <div class="card-description">
             {{$item->description}}
           </div>
           <div class="card-flap flap2">
             <div class="card-actions">
               <a href="detail/{{$item['id']}}" class="btn">Read more</a>
             </div>
           </div>
         </div>
       </div>--}}
       <div class="container-1 mx-auto mt-4">
        <form action="{{url('search')}}" method="GET" role="search">
          <div class="d-flex align-items-center justify-content-center">
           
              <div><input type="search" id="search" name="search" class="" placeholder="SEARCH" value=""/></div>
           <button type="submit" class="btn btn-outline-dark  ms-3">SEARCH</button> 
            
          </div>
         
        </form>
          
        
      </div>
       <div class="col-lg-12 d-flex flex-wrap">
       @foreach($products as $item)
       
       <div class="col-md-4 col-lg-4 d-flex px-3 ">
         <div class="product-card ">
             
             <div class="product-tumb">
                 <a href="detail/{{$item['id']}}" class="h-100 w-100"><img src="{{asset('storage/photos/'.$item->photo1)}}" alt="" height="100%" width="100%"></a>
             </div>
             <div class="product-details">
              
                 <span class="product-catagory text-pink">{{$item->categories}}</span>
              
                 <h4><a href="detail/{{$item['id']}}">{{$item->name}}</a></h4>
                 <div class="product-price"><p class="text-success text-bold">{{$item->price}}$</p></div>
                 <p>{{$item->description}}</p>
                 <div class="product-bottom-details">
                     
                     {{-- <div class="product-links">
                         <a href="detail/{{$item['id']}}" class="d-inline text-decoration-none "><span>DETAIL</span></a> 
                         <a href="/add_to_cart/{{$item['id']}}" class="d-inline text-decoration-none ms-3"><span>ADD TO CART</span></a>
                        
                     </div> --}}
                 </div>
             </div>
         </div>
     </div>
   @endforeach
  </div>




     
       </div>
</div>
   
        @endsection




