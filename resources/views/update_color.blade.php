@extends('master') @section('content')

<div class="container-fluid">
  <div class="container">
    <div class="mt-4 mx-auto bg-pink p-4 position-relative">
      <form method="POST" action="/admin/color_update/{{$color->id}}" enctype="multipart/form-data">
        
        @Method('PATCH')
        @csrf
        <h2 class="text-center text-info">Update Color</h2>
        <div class="row d-flex">
          <div class="input-group mb-3 w-50">
            <span class="input-group-text" id="basic-addon1">Color name</span>
            <input
              type="text"
              class="form-control"
              placeholder="color"
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="name"
              value="{{$color->color}}"
              name="color"
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
