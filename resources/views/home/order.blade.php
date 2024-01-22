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

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- @include('admin.css') --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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
             background-color: #f06f75;
            }
    </style>

   </head>
   <body>

    @include('sweetalert::alert')

      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')

         <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss = "alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif

                <h2 class="font_size">All Available Order</h2>
                {{-- <div class="font_size">
                    <form action="{{ url('search') }}" method="GET">
                        @csrf
                        <input type="text" name="search" placeholder="search something" style="color: black">
                        <button class="btn" ><i class="fa fa-search"></i></button>
                    </form>
                </div> --}}
                <table class="center">
                    <tr class="th_col">


                        <td class="th_d">Product title</td>
                        <td class="th_d">Quantity</td>
                        <td class="th_d">Price</td>
                        <td class="th_d">Payment Status</td>
                        <td class="th_d">Delivery Status</td>
                        <td class="th_d">Image</td>
                        <td class="th_d">Cancel Order</td>

                    </tr>

                    @forelse ($order as $order)
                    <tr>


                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td>
                            <img class="img_size" src="/product/{{ $order->image }}">
                        </td>



                        <td>
                            @if ($order->delivery_status == 'Processing')

                            <a onclick="confirmation(event)" href="{{ url('cancel_order', $order->id)  }}"><button class="btn"><i class="fa fa-close" style="font-size:36px"></i></button></a>

                            @else

                            <i class="material-icons">&#xe876;</i>
                            @endif
                        </td>

                    </tr>


                    @empty

                    <tr>
                        <td colspan="16">
                            No Data Found
                        </td>
                    </tr>

                    @endforelse
                </table>


                <script>
                    function confirmation(ev) {
                        ev.preventDefault();
                        var urlToRedirect = ev.currentTarget.getAttribute('href');
                        console.log(urlToRedirect);

                        swal({
                            title: "Are you sure to cancel this order",
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
