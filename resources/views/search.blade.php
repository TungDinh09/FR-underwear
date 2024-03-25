



@extends('master')
@section("content")
<div class="cards">
      @foreach($products as $item)
        <div class="card">
          <div class="card__image-holder">
            <img
              class="card__image"
              src="{{asset('storage/photos/'.$item->photo)}}"
              alt="wave"
            />
          </div>
          <div class="card-title">
            <a href="detail/{{$item['id']}}" class="toggle-info btn">
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
        </div>







        @endforeach
        </div>


        @endsection
