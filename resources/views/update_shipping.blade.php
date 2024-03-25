@extends('master') @section('content')

<div class="container-fluid">
  <div class="container">
    <div class="mt-4 mx-auto bg-pink p-4 position-relative">
      <form method="POST" action="/admin/shipping_update/{{$shipping->id}}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <h2 class="text-center text-info">Update Shipping</h2>
        <div class="row d-flex">
          <div class="input-group mb-3 w-50">
            <span class="input-group-text" id="basic-addon1">Shipping name</span>
            <input
              type="text"
              class="form-control"
              placeholder="Shipping name"
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="name"
              name="name"
              value="{{$shipping->name}}"
            />
          </div>
          <div class="input-group mb-3 w-50">
            <span class="input-group-text" id="basic-addon1">Shipping price</span>
            <input
              type="number"
              class="form-control"
              placeholder="Shipping price"
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="name"
              name="price"
              value="{{$shipping->price}}"
            />
          </div>
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
</div>
