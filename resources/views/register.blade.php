<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />

  <link rel="stylesheet" type="text/css" href="{{ url('/css/Auth.css') }}">
  
  <link rel="stylesheet" type="text/css" href="{{ url('/css/Main.css') }}">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
  />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@600&family=Roboto&display=swap"
    rel="stylesheet"
  />
</head>

<body>
 <form action="{{route('register-user')}}" method="post" enctype='multipart/form-data'>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
    @endif
    @csrf
    <section class="vh-100 bg-pink" >
  <div class="container h-100 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center ">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name='name' value="{{old('name')}}"/>
                      <label class="form-label" for="form3Example1c">Your Name</label>
                      <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" name='email' value="{{old('email')}}" />
                      <label class="form-label" for="form3Example3c">Your Email</label>
                      <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name='password' value="{{old('password')}}" />
                      <label class="form-label" for="form3Example4c">Password</label>
                      <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="mb-3">

  <input class="form-control" type="file" id="formFile" name='image' value="{{old('image')}}">
  <span class="text-danger">@error('image') {{$message}} @enderror</span>

</div>



                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    
                  <p class="">
                    <span class="text-pink">Already had an account ? </span><a href="/login">Login</a>
                  </p>
                     
                  
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 button">
                    <button type="submit" class="">Register</button>
                  </div>

                </form>

              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form> 
{{-- <main class="container-fluid d-flex-allcenter">
  <div class="container-wrapper">
    <div class="container-btn d-flex-row">
      <a
        href="/login"
        class="btn-change d-flex-allcenter SignIpBtn-link btn-active"
      >
        LOGIN
      </a>
      <a href="/register" class="btn-change d-flex-allcenter SignUpBtn-link">
        REIGISTER
      </a>
    </div>

    <div class="wrapper">

      <div class="form-wrapper sign-up">
        <form action="/register" class="" method="POST">
          @csrf
          <h2>Sign Up</h2>
          <div class="input-group">
            <input type="text" name="name" id="name"  autocomplete="off" required value="{{ old('name') }}"/>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            <label for="name">{{ __('Name') }}</label>
          </div>
                 
          <div class="input-group">
            <input type="email" name="email" id="email"   autocomplete="off" required  value="{{ old('email') }}"/>
            @error('email')
             <span class="invalid-feedback" role="alert">
               <strong>{{$message}}</strong>
              </span>
            @enderror
            <label for="email">{{ __('Email Address') }}</label>
          </div>
          
          
          <div class="input-group">
            <input type="password" name="password" id="password" required />
            <label for="password">{{ __('Password') }}</label>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

  
  
      
    
          
          
          <div class="button">
            <button type="submit">{{ __('Register') }}</button>
          </div>
          <div class="signUp-link">
            Already have an account?
            <a href="/login" class="SignIpBtn-linkmini">Sign In</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
 --}}

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
