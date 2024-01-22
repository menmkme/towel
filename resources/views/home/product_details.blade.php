<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Towel-</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}" />
      <!-- Custom styles for this template -->
      <link rel="stylesheet" href="{{ asset('home/css/style.css') }} "/>
      <!-- responsive style -->
      <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}" />


   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px;">
            <div class="box">
               <div class="option_container">

               </div>
               <div class="img-box" style="padding: 20px">
                  <img src="/product/{{ $product->image }}" alt="" width="250px" height="250px">
               </div>
               <div class="detail-box">
                  <h5>
                     {{ $product->title }}
                  </h5>

                @if ($product->discount_price != null)

                <h6 style="color: red">
                   discount price
                   <br>
                   {{ $product->discount_price }}
                </h6>

                  <h6 style="text-decoration: line-through; color: blue">
                   price
                   <br>
                     {{ $product->price }}
                  </h6>

                  @else
                  <h6 style="color: blue">
                   price
                   <br>
                  {{ $product->price }}
                  </h6>
                @endif

                <h5>Product Catagory:{{  $product->catagory }}</h5>
                <h5>Product Description:{{  $product->description }}</h5>
                <h5>Available Quantity:{{  $product->quantity }}</h5>

                <form action="{{ url('add_to_cart', $product->id) }}" method="POST">
                    @csrf

                    <input type="number" name="quantity" min="1" value="" style="background: black; color: white;" placeholder="No of quantity you want" required>
                    <input type="submit" value="Add to Cart">

                  </form>
               </div>
            </div>
         </div>

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Thanks goes to ALLAH</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">Nmk</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
