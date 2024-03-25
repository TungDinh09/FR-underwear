{{-- <div class="custom-product">
     <div class="col-sm-10">
        <table class="table">

            <tbody>
              <tr>
                <td>Price</td>
              <td>$ {{$total}}</td>
              </tr>
              <tr>
                <td>Quantity</td>
                <td></td>
              </tr>
              <tr>
                <td>Delivery </td>
                <td>$ 10</td>
              </tr>
              <tr>
                <td>Total Amount</td>
              <td>$ {{$total}}</td>
              </tr>
            </tbody>
          </table>
          <div>
            <form action="/orderplace" method="POST" >
              @csrf
                <div class="form-group">
                  <textarea name="address" placeholder="enter your address" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                  <label for="pwd">Payment Method</label> <br> <br>
                  <input type="radio" value="cash" name="payment"> <span>online payment</span> <br> <br>
                  <input type="radio" value="cash" name="payment"> <span>EMI payment</span> <br><br>
                  <input type="radio" value="cash" name="payment"> <span>Payment on Delivery</span> <br> <br>

                </div>
                <button type="submit" class="btn btn-default">Order Now</button>
              </form>
          </div>
     </div>
</div> --}}

@extends('master')
@section('content')
<div class="container-fluid bg-pink py-4">
  <div class="container-checkout d-flex">
    <div class="colored"></div>
    
    <div class="form">
      <h3>Payment informations</h3>
      <form action="/orderplace/{{$total}}" method="post" class="col-6-lg ">
        @csrf
        <div class="form-group">
          <textarea name="address" placeholder="enter your address" class="form-control" ></textarea>
          <span class="text-danger">@error('address') {{$message}} @enderror</span>
        </div>
        <div class="mx-auto ">
          <label for="payment">PAYMENT METHOD</label>
        <select name="payment" id="payment" style="font-family: 'Comfortaa';">
                    <span class="select">
          @foreach ($payments as $payment)
          <option value="{{$payment->id}}">{{$payment->name}}</option>
        @endforeach

        </select></span>

        <label for="shipping">Shipping method</label> <br> <br>
        <select name="shipping" id="shipping">
          @foreach ($shippings as $shipping)
              <option value="{{$shipping->id}}">{{$shipping->name}} - ${{$shipping->price}}</option>
          @endforeach  
        </select>     
        </div>
        

        <div class="price">
          
          <span class="text-success"  style="font-family: 'Comfortaa';"><span class="text-dark" style="font-family: 'Comfortaa';">Total :</span>$ {{$total}}</span>
          
          </div>
        <p>Your credit card information are Encrypted </p>
        <button class="button-checkout" type="submit"  style="font-family: 'Comfortaa';">ORDER NOW</button>
      </form>
    </div>
  </div>
  
  
</div>



@endsection
   