{{-- <div class="custom-product">
     <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>my orders </h4>
            @foreach($orders as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trending-image"  src="{{asset('storage/photos/'.$item->photo1)}}">
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>Name : {{$item->name}}</h2>
                      <h5>Delivery Status : {{$item->status}}</h5>
                      <h5>Address : {{$item->address}}</h5>
                      <h5>Payment Status : {{$item->payment_status}}</h5>
                      <h5>Payment Method : {{$item->payment_method}}</h5>

                    </div>
             </div>

            </div>
            @endforeach
          </div>

     </div>
</div> --}}

@extends('master')
@section('content')

<div class="container-fluid bg-pink">
<div class="container py-3">
  
  {{-- <div class="d-flex mx-auto flex-wrap bg-pink">
    
<div class="col-6 d-flex justify-content-center align-items-center">
  
  <a href="detail/{{$item->id}}">
    <img src="{{asset('storage/photos/'.$item->photo1)}}" alt="" height="360px" width="360px"></a>
                <div class="pt-3">
                    
</div>
</div>
<div class="col-6 flex flex-column align-items-center ">
  <h2 class="text-pink">{{$item->name}}</h2>
  <p><span>Status:</span>{{$item->status}}</p>
  <p><span>Address:</span>{{$item->address}}</p>
  <p class="uppercase"><span>Payment_method</span>{{$item->payment_method}}</p>
  <p class="text-pink text-bold">{{$item->payment_status}}</p>
  <div>
      <span class="text-success">Price:USD</span>
  </div>
</div>
  </div>
</div> --}}
<div class="list">
  <div class="heading">
    <h4>Order List</h4>
    <i class="fas fa-ellipsis-h"></i>
  </div>
  <form>
    
    <input type="text" placeholder="Search">
    
    <input type="submit" value="Search">
  </form>


 
 
  <table class="table">
    <thead>
      <tr>
        <th scope="col"><p>Product image</p> </th>
        <th scope="col"><p>Product Name</p></th>
        <th scope="col"><p>Price</p></th>
        <th scope="col"><p>Amount</p></th>
        <th scope="col"><p>Status</p></th>
        <th scope="col"><p>Payment method</p></th>
        <th scope="col"><p>Shipping type</p></th>
        <th scope="col"><p>Address</p></th>
      </tr>
    </thead>
    <tbody>
      <?php $total = 0?>
      @foreach($orders_lines as $order_line)
      <tr>
        <th scope="row"> <a href="detail/{{$order_line->product_id}}">
          <img src="{{asset('storage/photos/'.$order_line->photo1)}}" alt="" height="80px" width="80px"></a></th>
        <th scope="row"><a href="detail/{{$order_line->id}}" class="text-pink">{{$order_line->name}}</a></th>
        <td><p class="text-success">{{$order_line->price}}$</p></td>
        <td><p class="text-warning text-center">{{$order_line->quantity}}</p></td>
        <td><p class="text-danger">pending</p></td>
        <td><p class="text-success"> {{DB::table('payment_types')->where('id', $order_line->payment_type_id)->get('name')[0]->name }}</p></td>
        
        <td><p class="text-danger">{{DB::table('shippings')->where('id', $order_line->shipping_method_id)->get('name')[0]->name }}</p></td>
        <td><p class="text-dark">{{$order_line->address}}</p></td>
     
      </tr>
      <?php $total += $order_line->price*$order_line->quantity?>
      @endforeach
      
      <tfoot>
              
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ URL::to('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
               
                
            </td>
            <td>
              <span>Total :<p class="text-success">{{$total}}$</p></span>
            </td>
          
             
    </tfoot>
    </tbody>
    
  </table>

 
</div>
@endsection
