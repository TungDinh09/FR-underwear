<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./product.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!-- CSS -->
   <link rel="stylesheet" type="text/css" href="{{ url('/css/Main.css') }}">
   <link rel="stylesheet" type="text/css" href="{{url('/css/productslist.css')}}">
   <link rel="stylesheet" type="text/css" href="{{url('/css/homepage.css')}}">
   <link rel="stylesheet" type="text/css" href="{{url('/css/productlist.css')}}">
    
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

{{View::make('header')}}
@yield('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="./product.js"></script>

    <footer class="position-absolute w-100">
      <div class="container-fluid py-4 ">
          <div class="container mx-auto">
              <div class="row mx-auto">
                  <div class="col-lg-3 col-sm-6">
                      <div class="mb-3">
                          <a href="" class="navbar-brand ">
                              <img src="/img/logo-black.png" alt="" height="60px">
                          </a>
                          <p>Featherose is a market platform focus on providing outstanding fashion design which help you to
                              become more attractive and feel more confident. Featherose is the best choice for the one who want to be more alluring
                              and charming
                          </p>
                          <a href="#" class="ml-1"><i class="fa-brands fa-facebook icon-color icon-hover"></i></a>
                          <a href="#" class="ml-1"><i class="fa-brands fa-twitter icon-color icon-hover"></i></a>
                          <a href="#" class="ml-1"><i class="fa-brands fa-instagram icon-color icon-hover"></i></a>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 footer-item-border">
                      <div class="card-footer d-flex align-items-center justify-content-center mx-auto flex-wrap position-relative">
                       
                          <div class="footer-text">
                              <h4 class="text-center text-dark ">Email</h4>
                              <p class="align-center justify-center"><i class="fa-regular fa-envelope fa-2xl" style="color: #ffb8d7"></i></p>
                              <a href="" class="nav-link hover-link text-dark">featherosesp31@gmail.com</a>
                          </div>
                         
                      </div>
                  </div>
  
                  <div class="col-lg-3 col-sm-6 ">
                    <div class="card-footer d-flex align-items-center justify-content-center mx-auto flex-wrap position-relative">
                     
                        <div class="footer-text">
                            <h4 class="text-center text-pink ">FOLLOW US ON</h4>
                            <p class="align-center justify-center"><a href=""><i class="fa-brands fa-facebook fa-xl" style="color: #ffb8d7;"></a></i>
                                <a href=""><i class="fa-brands fa-twitter fa-xl" style="color: #ffb8d7"></i></a></p>
                            
                        </div>
                       
                    </div>
                </div>
  
                <div class="col-lg-3 col-sm-6 footer-item-border">
                    <div class="card-footer d-flex align-items-center justify-content-center mx-auto flex-wrap position-relative">
                     
                        <div class="footer-text">
                            <h4 class="text-center text-dark">Phone</h4>
                            <p class="align-center justify-center"><i class="fa-solid fa-phone fa-xl" style="color: #ffb8d7"></i></p>
                            <a href="" class="nav-link hover-link text-dark">0868284726</a>
                        </div>
                       
                    </div>
                </div>
              </div>
          </div>
        
      </div>
  </footer>
</body>
<script>
    $(document).ready(function() {
  $('.num-in span').click(function () {
      var $input = $(this).parents('.num-block').find('input.in-num');
    if($(this).hasClass('minus')) {
      var count = parseFloat($input.val()) - 1;
      count = count < 1 ? 1 : count;
      if (count < 2) {
        $(this).addClass('dis');
      }
      else {
        $(this).removeClass('dis');
      }
      $input.val(count);
    }
    else {
      var count = parseFloat($input.val()) + 1
      $input.val(count);
      if (count > 1) {
        $(this).parents('.num-block').find(('.minus')).removeClass('dis');
      }
    }
    
    $input.change();
    return false;
  });
  
});
  </script>
</html>
