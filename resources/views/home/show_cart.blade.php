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

      <style type="text/css">
        .center
        {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }
        .font_size
        {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }
        .img_size
        {
            height: 70px;
            width: 100px;
        }
        .th_col
        {
            background: #f7444e;
        }
        .th_d
        {
            padding: 20px;
        }
        .btn {
            background-color: #f7444e;
            border: none;
            color: white;
            padding: 7px 9px;
            font-size: 16px;
            cursor: pointer;
        }

/* Darker background on mouse-over */
        .btn:hover {
             background-color: 00#f8767c;
            }
    </style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   </head>
   <body>

    @include('sweetalert::alert')

      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->

         <!-- end slider section -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss = "alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
            @endif
            <h2 class="font_size">***Cart***</h2>
            <table class="center">
                <tr class="th_col">

                    <td class="th_d">Product Title</td>
                    <td class="th_d">Product Quantity</td>
                    <td class="th_d">Price</td>
                    <td class="th_d">Image</td>
                    <td class="th_d">Action</td>
                </tr>

                <?php  $totalprice=0 ?>
                @foreach ($cart as $cart)
                <tr>

                    <td>{{ $cart->product_title }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>{{ $cart->price }}</td>
                    <td>
                        <img class="img_size" src="/product/{{ $cart->image }}">
                    </td>
                    <td>
                        <a onclick="confirmation(event)" href="{{ url('delete_cart', $cart->id)  }}"><button class="btn"><i class="fa fa-trash"></i></button></a>

                    </td>
                </tr>

                <?php $totalprice = $totalprice + $cart->price ?>
                @endforeach
            </table>
            <div class="center">
                <h4>
                    Total Price : {{ $totalprice }}
                </h4>
            </div>
            <div class="center" style="padding-bottom: 113px">
                <h1 style="font-size: 25px; padding-bottom: 15px;">Proceed to Order</h1>
                <a href="{{ url('cash_order') }}" class="btn btn-danger">Cash on Delivery</a>

                <a href="{{ url('stripe',$totalprice) }}" class="btn btn-danger">Pay using Card</a>
            </div>
        </div>
    </div>
      <!-- content-wrapper ends -->



      <!-- footer start -->
      {{-- @include('home.footer') --}}
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Thanks goes to ALLAH</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">Nmk</a>

         </p>
      </div>

      <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                title: "Are you sure to remove this from cart",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCancel) => {
                if(willCancel) {

                    window.location.href = urlToRedirect;
                }
            });
        }
      </script>

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
