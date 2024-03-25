@extends('master') @section('content')

<div class="container-fluid">
  <div class="container">
    <div class="mt-4 mx-auto bg-pink p-4 position-relative">
      <form method="POST" action="/admin/payment_update/{{$payment->id}}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <h2 class="text-center text-info">Update Payment</h2>
        <div class="row d-flex">
          <div class="input-group mb-3 w-50">
            <span class="input-group-text" id="basic-addon1"
              >Payment name</span
            >
            <input
              type="text"
              class="form-control"
              placeholder="Category name"
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="name"
              name="name"
              value="{{$payment->name}}"
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
