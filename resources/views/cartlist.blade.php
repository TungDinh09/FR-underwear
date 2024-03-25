{{--@extends('master')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>
            @foreach($products as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trending-image"  src="{{asset('storage/photos/'.$item->photo1)}}">
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>{{$item->name}}</h2>
                      <h5>{{$item->description}}</h5>
                    </div>
             </div>
             <div class="col-sm-3">
                <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning" >Remove to Cart</a>
             </div>
            </div>
            @endforeach
          </div>
          <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>

     </div>
</div>
@endsection--}}
@extends('master')
@section('content')
<div class="container-fluid bg-pink">
    <div class="container py-4">
        {{-- <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                    
                    <th style="width:30%">Description</th>
                   <th style="width:30%">quantity</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                
                    
                    
                        <td data-th="Product">
                            @foreach($products as $item)
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{asset('storage/photos/'.$item->photo1)}}" width="100" height="100" class="img-responsive"/></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{$item->name}}}</h4>
                                </div>
                            </div>
                        </td>
                       
                        <td data-th="Price">${{ $item->price }}</td>
                        <td data-th="Price">{{ $item->description }}</td>
                        <td data-th="Price">{{ $item->quantity }}</td>
                        
                        
                        
                        <td class="actions" data-th="">
                            <a href="/removecart/{{$item->cart_id}}"><button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button></a>
                        </td>
                        @endforeach
                    </tr>
            
                   
           
            </tbody>
            <tfoot>
              
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="{{ URL::to('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                        <a href="ordernow"><button class="btn btn-success" type="submit"><i class="fa fa-money"></i> Checkout</button></a>
                    </td>
                </tr>
            </tfoot>
        </table>
   --}}


<div class="list">
    <div class="heading">
      <h4>Cart List</h4>
      <i class="fas fa-ellipsis-h"></i>
    </div>
    <form>
      
      <input type="text" placeholder="Search">
      
      <input type="submit" value="Search">
    </form>
  
  
   
   
    <table class="table"id="cart">
      <thead>
        <tr>
          <th scope="col"><p>Product image</p> </th>
          <th scope="col"><p>Product Name</p></th>
          <th scope="col"><p>Price</p></th>
          
          <th scope="col"><p>Quantity</p></th>
          <th scope="col"><p>Desciption</p></th>
          <th scope="col"><p>TOTAL MONEY</p></th>
         
        </tr>
      </thead>
      <tbody>
        <?php $total = 0?>
        @foreach($products as $item)  
        <tr>
          <th scope="row"> <a href="detail/{{$item->id}}">
            <img src="{{asset('storage/photos/'.$item->photo1)}}" alt="" height="80px" width="80px"></a></th>
          <th scope="row"><a href="/detail/{{$item->id}}" class="text-pink">{{$item->name}}</a></th>
          <td><p class="text-success">{{$item->price}}$</p></td>
          
          <td><p class="text-danger">{{ $item->quantity }}</p></td>
          <td><p class=" mx-auto">{{$item->description}}</p></td>
          <td><p class="text-success">{{$item->price*$item->quantity}}$</p></td>
          <td>
            
            <a href="/removecart/{{$item->id}}" class="btn btn-warning" >Remove to Cart</a>
          
        </td>
        <?php $total += $item->price*$item->quantity?>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
              
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ URL::to('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
               
                
            </td>
            <td>
              
            </td>
          
             
    </tfoot>
    </table>
    <span>Total :<p class="text-success">{{$total}}$</p></span>
    <a href="ordernow/{{$total}}"><button class="btn btn-success" type="submit"><i class="fa fa-money"></i> Checkout</button></a>
             
        </tr>
  </div>
</div>
</div>
@endsection
